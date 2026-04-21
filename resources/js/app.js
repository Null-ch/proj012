import './bootstrap';

const initAboutInteractive = () => {
    const steps = document.querySelectorAll('[data-about-step]');
    const panels = document.querySelectorAll('[data-about-panel]');

    if (!steps.length || !panels.length) {
        return;
    }

    steps.forEach((step) => {
        step.addEventListener('click', () => {
            const targetId = step.dataset.target;

            steps.forEach((item) => item.classList.remove('is-active'));
            panels.forEach((panel) => panel.classList.remove('is-active'));

            step.classList.add('is-active');
            const panel = document.getElementById(targetId);
            if (panel) {
                panel.classList.add('is-active');
            }
        });
    });
};

const initServicesSlider = () => {
    const slider = document.querySelector('[data-services-slider]');

    if (!slider) {
        return;
    }

    const prevButton = document.querySelector('[data-services-prev]');
    const nextButton = document.querySelector('[data-services-next]');
    const scrollStep = () => {
        const firstCard = slider.querySelector('.service-card');

        if (!firstCard) {
            return slider.clientWidth;
        }

        const cardWidth = firstCard.getBoundingClientRect().width;
        const sliderStyles = window.getComputedStyle(slider);
        const gap = Number.parseFloat(sliderStyles.columnGap || sliderStyles.gap) || 0;

        return cardWidth + gap;
    };

    nextButton?.addEventListener('click', () => {
        slider.scrollBy({ left: scrollStep(), behavior: 'smooth' });
    });

    prevButton?.addEventListener('click', () => {
        slider.scrollBy({ left: -scrollStep(), behavior: 'smooth' });
    });
};

const initGalleryLightbox = () => {
    const lightbox = document.querySelector('[data-gallery-lightbox]');
    const lightboxImage = document.querySelector('[data-gallery-lightbox-image]');
    const closeButton = document.querySelector('[data-gallery-close]');
    const openButtons = document.querySelectorAll('[data-gallery-image]');

    if (!lightbox || !lightboxImage || !openButtons.length) {
        return;
    }

    const closeLightbox = () => {
        lightbox.hidden = true;
        lightbox.classList.remove('is-open');
        lightboxImage.src = '';
        lightboxImage.alt = '';
        document.body.style.overflow = '';
    };

    openButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const src = button.dataset.imageSrc;
            const alt = button.dataset.imageAlt || 'Изображение работы';

            if (!src) {
                return;
            }

            lightboxImage.src = src;
            lightboxImage.alt = alt;
            lightbox.hidden = false;
            lightbox.classList.add('is-open');
            document.body.style.overflow = 'hidden';
        });
    });

    closeButton?.addEventListener('click', closeLightbox);

    lightbox.addEventListener('click', (event) => {
        if (event.target === lightbox) {
            closeLightbox();
        }
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && !lightbox.hidden) {
            closeLightbox();
        }
    });
};

const initServicesModal = () => {
    const modal = document.querySelector('[data-service-modal]');
    const modalImage = document.querySelector('[data-service-modal-image]');
    const modalTitle = document.querySelector('[data-service-modal-title]');
    const modalText = document.querySelector('[data-service-modal-text]');
    const openButtons = document.querySelectorAll('[data-service-open]');
    const closeButton = document.querySelector('[data-service-close]');

    if (!modal || !modalImage || !modalTitle || !modalText || !openButtons.length) {
        return;
    }

    const closeModal = () => {
        modal.hidden = true;
        modal.classList.remove('is-open');
        document.body.style.overflow = '';
    };

    openButtons.forEach((button) => {
        button.addEventListener('click', () => {
            modalImage.src = button.dataset.serviceImage || '';
            modalImage.alt = button.dataset.serviceTitle || 'Услуга';
            modalTitle.textContent = button.dataset.serviceTitle || 'Услуга';
            modalText.textContent = button.dataset.serviceDetails || '';

            modal.hidden = false;
            modal.classList.add('is-open');
            document.body.style.overflow = 'hidden';
        });
    });

    closeButton?.addEventListener('click', closeModal);

    modal.addEventListener('click', (event) => {
        if (event.target === modal) {
            closeModal();
        }
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && !modal.hidden) {
            closeModal();
        }
    });
};

initAboutInteractive();
initServicesSlider();
initGalleryLightbox();
initServicesModal();
