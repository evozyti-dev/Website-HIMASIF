const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
const $ = (sel, root = document) => root.querySelector(sel);
const $$ = (sel, root = document) => Array.from(root.querySelectorAll(sel));

function onVisible(elements, callback, options = { threshold: 0.35 }) {
    if (!('IntersectionObserver' in window)) {
        elements.forEach(callback);
        return;
    }
    const io = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                callback(entry.target);
                io.unobserve(entry.target);
            }
        });
    }, options);
    elements.forEach((el) => io.observe(el));
}

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

function marquee() {
    $$('.tk-marquee__track').forEach((track) => {
        track.innerHTML += track.innerHTML;
        track.lastElementChild && $$('.tk-marquee__item', track).slice(track.children.length / 2)
            .forEach((item) => item.setAttribute('aria-hidden', 'true'));
    });
}

function dividers() {
    onVisible($$('.tk-divider'), (el) => el.classList.add('is-visible'));
}

function revealWords() {
    $$('[data-tk-reveal]').forEach((el) => {
        const keys = (el.dataset.tkKeys || '').toLowerCase().split(',').map((k) => k.trim()).filter(Boolean);
        const words = el.textContent.trim().split(/\s+/);
        el.innerHTML = words.map((w) => {
            const clean = w.toLowerCase().replace(/[^a-z0-9]/g, '');
            const isKey = keys.includes(clean);
            return `<span class="tk-reveal-word${isKey ? ' is-key' : ''}">${w}</span>`;
        }).join(' ');
        const spans = $$('.tk-reveal-word', el);
        onVisible([el], () => {
            spans.forEach((s, i) => setTimeout(() => s.classList.add('is-on'), reduceMotion ? 0 : i * 55));
        }, { threshold: 0.4 });
    });
}

function timeline() {
    const tl = $('.tk-timeline');
    if (!tl) return;
    const fill = $('.tk-timeline__fill', tl);
    const items = $$('.tk-misi', tl);
    let ticking = false;

    function update() {
        const r = tl.getBoundingClientRect();
        const mid = window.innerHeight * 0.6;
        const progress = Math.min(1, Math.max(0, (mid - r.top) / r.height));
        if (fill) fill.style.height = (progress * 100).toFixed(1) + '%';
        items.forEach((item) => {
            const ir = item.getBoundingClientRect();
            item.classList.toggle('is-lit', ir.top + 30 < mid);
        });
        ticking = false;
    }
    window.addEventListener('scroll', () => {
        if (!ticking) { requestAnimationFrame(update); ticking = true; }
    }, { passive: true });
    window.addEventListener('resize', update);
    update();
}

function rings() {
    const els = $$('[data-tk-ring]');
    onVisible(els, (el) => {
        const value = Math.min(100, Math.max(0, parseFloat(el.dataset.tkRing) || 0));
        const circle = $('.tk-ring__val', el);
        const label = $('.tk-ring__label', el);
        const full = 251.2;
        if (circle) circle.style.strokeDashoffset = (full - (full * value) / 100).toFixed(1);
        if (!label || label.querySelector('i')) return;
        const start = performance.now();
        const dur = reduceMotion ? 1 : 2000;
        (function step(now) {
            const t = Math.min(1, (now - start) / dur);
            const eased = 1 - Math.pow(1 - t, 3);
            label.textContent = Math.round(value * eased) + '%';
            if (t < 1) requestAnimationFrame(step);
        })(start);
    });
}

export function initVisiMisi() {
    heroWords();
    marquee();
    dividers();
    revealWords();
    timeline();
    rings();
}
