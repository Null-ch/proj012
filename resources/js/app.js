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

const initToast = () => {
    const toast = document.querySelector('[data-toast]');
    const closeButton = document.querySelector('[data-toast-close]');

    if (!toast) {
        return;
    }

    const removeToast = () => {
        toast.classList.add('is-hidden');
        window.setTimeout(() => {
            toast.remove();
        }, 220);
    };

    closeButton?.addEventListener('click', removeToast);
    window.setTimeout(removeToast, 5000);
};

const initBackToTop = () => {
    const button = document.querySelector('[data-back-to-top]');

    if (!button) {
        return;
    }

    const toggleVisibility = () => {
        const isVisible = window.scrollY > 400;
        button.classList.toggle('is-visible', isVisible);
    };

    button.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    window.addEventListener('scroll', toggleVisibility, { passive: true });
    toggleVisibility();
};

const initRequestForm = () => {
    const form = document.querySelector('[data-request-form]');

    if (!form) {
        return;
    }

    const submitButton = form.querySelector('[data-request-submit]');
    const successAlert = form.querySelector('[data-request-success]');
    const errorAlert = form.querySelector('[data-request-error]');
    const successAlertText = form.querySelector('[data-request-success-text]');
    const errorAlertText = form.querySelector('[data-request-error-text]');
    const successCloseButton = form.querySelector('[data-request-success-close]');
    const errorCloseButton = form.querySelector('[data-request-error-close]');
    let successHideTimerId;
    let errorHideTimerId;

    const hideAlerts = () => {
        successAlert?.setAttribute('hidden', 'hidden');
        errorAlert?.setAttribute('hidden', 'hidden');

        if (successHideTimerId) {
            window.clearTimeout(successHideTimerId);
            successHideTimerId = undefined;
        }

        if (errorHideTimerId) {
            window.clearTimeout(errorHideTimerId);
            errorHideTimerId = undefined;
        }
    };

    const showAlert = (target, targetText, message, type = 'success') => {
        if (!target) {
            return;
        }

        if (targetText) {
            targetText.textContent = message;
        }
        target.removeAttribute('hidden');

        if (type === 'success') {
            if (successHideTimerId) {
                window.clearTimeout(successHideTimerId);
            }

            successHideTimerId = window.setTimeout(() => {
                target.setAttribute('hidden', 'hidden');
            }, 5000);
        }
    };

    successCloseButton?.addEventListener('click', () => {
        successAlert?.setAttribute('hidden', 'hidden');
        if (successHideTimerId) {
            window.clearTimeout(successHideTimerId);
            successHideTimerId = undefined;
        }
    });

    errorCloseButton?.addEventListener('click', () => {
        errorAlert?.setAttribute('hidden', 'hidden');
        if (errorHideTimerId) {
            window.clearTimeout(errorHideTimerId);
            errorHideTimerId = undefined;
        }
    });

    form.addEventListener('submit', async (event) => {
        event.preventDefault();
        hideAlerts();

        submitButton?.setAttribute('disabled', 'disabled');
        const originalButtonText = submitButton?.textContent;
        if (submitButton) {
            submitButton.textContent = 'Отправляем...';
        }

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                body: new FormData(form),
                headers: {
                    Accept: 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                },
            });

            const payload = await response.json().catch(() => ({}));

            if (!response.ok) {
                const validationErrors = payload?.errors ? Object.values(payload.errors).flat() : [];
                const errorMessage = validationErrors[0] || payload?.message || 'Не удалось отправить заявку. Попробуйте еще раз.';
                showAlert(errorAlert, errorAlertText, errorMessage, 'error');
                return;
            }

            form.reset();
            showAlert(
                successAlert,
                successAlertText,
                payload?.message || 'Заявка успешно отправлена. Мы скоро свяжемся с вами.',
                'success',
            );
        } catch {
            showAlert(errorAlert, errorAlertText, 'Ошибка сети. Проверьте соединение и повторите отправку.', 'error');
        } finally {
            if (submitButton) {
                submitButton.removeAttribute('disabled');
                submitButton.textContent = originalButtonText || 'Отправить';
            }
        }
    });
};

initAboutInteractive();
initServicesSlider();
initGalleryLightbox();
initServicesModal();
initToast();
initBackToTop();
initRequestForm();
