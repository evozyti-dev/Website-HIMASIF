const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
const $ = (sel, root = document) => root.querySelector(sel);
const $$ = (sel, root = document) => Array.from(root.querySelectorAll(sel));

function heroWords() {
    $$('[data-tk-words]').forEach((el) => {
        let i = 0;
        const wrap = (node) => {
            const span = document.createElement('span');
            span.className = 'tk-hero-word';
            span.style.animationDelay = (0.15 + i++ * 0.09).toFixed(2) + 's';
            span.appendChild(node);
            return span;
        };
        Array.from(el.childNodes).forEach((node) => {
            if (node.nodeType === Node.TEXT_NODE) {
                const frag = document.createDocumentFragment();
                node.textContent.split(/(\s+)/).forEach((part) => {
                    if (!part) return;
                    if (/^\s+$/.test(part)) frag.appendChild(document.createTextNode(' '));
                    else frag.appendChild(wrap(document.createTextNode(part)));
                });
                el.replaceChild(frag, node);
            } else if (node.nodeType === Node.ELEMENT_NODE && node.tagName !== 'BR') {
                const placeholder = document.createTextNode('');
                el.replaceChild(placeholder, node);
                el.replaceChild(wrap(node), placeholder);
            }
        });
    });
}

function lightbox(items) {
    const box = $('.tk-lightbox');
    if (!box) return;
    const img = $('.tk-lightbox__img', box);
    const title = $('.tk-lightbox__cap h3', box);
    const cat = $('.tk-lightbox__cap span', box);
    const count = $('.tk-lightbox__count', box);
    let list = [];
    let index = 0;
    let lastFocus = null;

    function show(i) {
        index = (i + list.length) % list.length;
        const item = list[index];
        const source = $('img', item);
        img.classList.add('is-swapping');
        setTimeout(() => {
            img.src = item.dataset.full || (source ? source.src : '');
            img.alt = source ? source.alt : (item.dataset.title || '');
            title.textContent = item.dataset.title || (source ? source.alt : '');
            cat.textContent = $('.tk-gallery__chip', item)?.textContent || '';
            count.textContent = `${index + 1} / ${list.length}`;
            img.onload = () => img.classList.remove('is-swapping');
            if (img.complete) img.classList.remove('is-swapping');
        }, reduceMotion ? 0 : 180);
    }

    function open(item) {
        list = items.filter((i) => !i.classList.contains('is-hidden'));
        lastFocus = document.activeElement;
        show(list.indexOf(item));
        box.classList.add('is-open');
        box.setAttribute('aria-hidden', 'false');
        document.body.classList.add('tk-no-scroll');
        $('.tk-lightbox__close', box)?.focus();
    }

    function close() {
        box.classList.remove('is-open');
        box.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('tk-no-scroll');
        if (lastFocus) lastFocus.focus();
    }

    items.forEach((item) => {
        item.addEventListener('click', () => open(item));
        item.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); open(item); }
        });
    });
    $('.tk-lightbox__close', box)?.addEventListener('click', close);
    $('.tk-lightbox__prev', box)?.addEventListener('click', () => show(index - 1));
    $('.tk-lightbox__next', box)?.addEventListener('click', () => show(index + 1));
    box.addEventListener('click', (e) => { if (e.target === box) close(); });
    document.addEventListener('keydown', (e) => {
        if (!box.classList.contains('is-open')) return;
        if (e.key === 'Escape') close();
        if (e.key === 'ArrowLeft') show(index - 1);
        if (e.key === 'ArrowRight') show(index + 1);
    });

    let startX = null;
    box.addEventListener('touchstart', (e) => { startX = e.touches.clientX; }, { passive: true });
    box.addEventListener('touchend', (e) => {
        if (startX === null) return;
        const dx = e.changedTouches.clientX - startX;
        if (Math.abs(dx) > 50) show(index + (dx < 0 ? 1 : -1));
        startX = null;
    });
}

export function initGaleri() {
    heroWords();

    const grid = $('.tk-gallery');
    if (!grid) return;
    const items = $$('.tk-gallery__item', grid);
    const filterWrap = $('.tk-filter');
    const pill = $('.tk-filter__pill', filterWrap);
    const buttons = $$('.tk-filter__btn', filterWrap);
    const moreBtn = $('[data-tk-more]');
    const empty = $('.tk-gallery__empty');
    const PAGE = parseInt(grid.dataset.page || '8', 10);
    let limit = PAGE;
    let current = 'semua';

    function movePill(btn) {
        if (!pill || !btn) return;
        pill.style.width = btn.offsetWidth + 'px';
        pill.style.transform = `translateX(${btn.offsetLeft}px)`;
    }

    function matches(item) {
        return current === 'semua' || item.dataset.category === current;
    }

    function render(animate) {
        const visible = items.filter(matches);
        items.forEach((item) => {
            const shouldShow = matches(item) && visible.indexOf(item) < limit;
            const isShown = !item.classList.contains('is-hidden');
            if (shouldShow && !isShown) {
                item.classList.remove('is-hidden', 'is-hiding');
                if (animate) {
                    item.style.animationDelay = (visible.indexOf(item) % PAGE) * 0.06 + 's';
                    item.classList.remove('is-entering');
                    void item.offsetWidth;
                    item.classList.add('is-entering');
                }
            } else if (!shouldShow && isShown) {
                item.classList.add('is-hidden');
            }
        });
        if (moreBtn) moreBtn.style.display = visible.length > limit ? '' : 'none';
        if (empty) empty.classList.toggle('is-show', visible.length === 0);
    }

    buttons.forEach((btn) => {
        btn.addEventListener('click', () => {
            if (btn.dataset.filter === current) return;
            buttons.forEach((b) => {
                b.classList.toggle('is-active', b === btn);
                b.setAttribute('aria-pressed', b === btn ? 'true' : 'false');
            });
            movePill(btn);
            current = btn.dataset.filter;
            limit = PAGE;
            const shown = items.filter((i) => !i.classList.contains('is-hidden'));
            shown.forEach((i) => i.classList.add('is-hiding'));
            setTimeout(() => {
                shown.forEach((i) => { i.classList.add('is-hidden'); i.classList.remove('is-hiding'); });
                render(true);
            }, reduceMotion ? 0 : 350);
        });
    });

    if (moreBtn) {
        moreBtn.addEventListener('click', () => {
            limit += PAGE;
            render(true);
        });
    }

    const active = buttons.find((b) => b.classList.contains('is-active')) || buttons;
    movePill(active);
    if (document.fonts && document.fonts.ready) document.fonts.ready.then(() => movePill(active));
    window.addEventListener('resize', () => movePill(buttons.find((b) => b.classList.contains('is-active'))));

    items.forEach((i) => i.classList.add('is-hidden'));
    render(false);
    lightbox(items);
}
