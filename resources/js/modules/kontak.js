const HIMASIF_KONTAK = {
    email: 'himasifuikabogor@gmail.com',
    whatsapp: '6280000000000', // Nomor WhatsApp resmi HIMASIF (sesuaikan jika sudah ada nomor baru)
    kirimLewat: 'whatsapp',
};

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

let toastTimer;
function toast(message) {
    let el = $('.tk-toast');
    if (!el) {
        el = document.createElement('div');
        el.className = 'tk-toast';
        el.setAttribute('role', 'status');
        el.setAttribute('aria-live', 'polite');
        document.body.appendChild(el);
    }
    el.textContent = message;
    requestAnimationFrame(() => el.classList.add('is-show'));
    clearTimeout(toastTimer);
    toastTimer = setTimeout(() => el.classList.remove('is-show'), 2600);
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

function phoneChat() {
    onVisible($$('.tk-phone'), (el) => el.classList.add('is-playing'), { threshold: 0.4 });
}

function lazyMap() {
    const frame = $('.tk-map iframe[data-src]');
    if (!frame) return;
    onVisible([frame], (el) => { el.src = el.dataset.src; }, { rootMargin: '300px' });
}

function contactForm() {
    const form = $('#tk-contact-form');
    if (!form) return;

    const rules = {
        nama: (v) => v.trim().length >= 3 || 'Nama minimal 3 huruf.',
        email: (v) => /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(v.trim()) || 'Format email belum benar.',
        telepon: (v) => v.trim() === '' || /^[0-9+\-\s]{9,16}$/.test(v.trim()) || 'Nomor telepon 9–16 digit.',
        pesan: (v) => v.trim().length >= 10 || 'Pesan minimal 10 karakter.',
    };

    function check(input) {
        const rule = rules[input.name];
        if (!rule) return true;
        const result = rule(input.value);
        const field = input.closest('.tk-field');
        const err = $('.tk-field__error', field);
        const ok = result === true;
        field.classList.toggle('is-invalid', !ok);
        input.setAttribute('aria-invalid', ok ? 'false' : 'true');
        if (err) err.textContent = ok ? '' : result;
        return ok;
    }

    $$('input, textarea', form).forEach((input) => {
        input.addEventListener('blur', () => { if (input.value) check(input); });
        input.addEventListener('input', () => {
            if (input.closest('.tk-field')?.classList.contains('is-invalid')) check(input);
        });
    });

    const msg = $('textarea[name="pesan"]', form);
    const counter = $('.tk-field__count', form);
    if (msg && counter) {
        const max = parseInt(msg.getAttribute('maxlength') || '500', 10);
        const upd = () => { counter.textContent = `${msg.value.length}/${max}`; };
        msg.addEventListener('input', upd);
        upd();
    }

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        if ($('.tk-honey', form)?.value) return;
        const inputs = $$('input:not(.tk-honey), textarea', form);
        const allOk = inputs.map(check).every(Boolean);
        if (!allOk) {
            toast('Periksa lagi isian yang ditandai merah.');
            const firstBad = $('.is-invalid input, .is-invalid textarea', form);
            firstBad && firstBad.focus();
            return;
        }
        const data = Object.fromEntries(new FormData(form));
        const text =
            `Halo HIMASIF, saya ${data.nama.trim()}.\n` +
            `Email: ${data.email.trim()}\n` +
            (data.telepon.trim() ? `Telepon: ${data.telepon.trim()}\n` : '') +
            `\n${data.pesan.trim()}`;

        const btn = $('.tk-send', form);
        btn?.classList.add('is-flying');
        setTimeout(() => {
            let url;
            if (HIMASIF_KONTAK.kirimLewat === 'email') {
                url = `mailto:${HIMASIF_KONTAK.email}?subject=${encodeURIComponent('Pesan dari Website HIMASIF')}&body=${encodeURIComponent(text)}`;
            } else {
                url = `https://wa.me{HIMASIF_KONTAK.whatsapp}?text=${encodeURIComponent(text)}`;
            }
            window.open(url, '_blank', 'noopener');
            toast('Pesan disiapkan. Lanjutkan kirim di aplikasi yang terbuka.');
            form.reset();
            $$('.tk-field', form).forEach((f) => f.classList.remove('is-invalid'));
            if (counter) counter.textContent = `0/${msg.getAttribute('maxlength') || 500}`;
            btn?.classList.remove('is-flying');
        }, reduceMotion ? 0 : 650);
    });
}

export function initKontak() {
    heroWords();
    phoneChat();
    lazyMap();
    contactForm();
}
