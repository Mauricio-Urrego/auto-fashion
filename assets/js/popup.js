window.addEventListener('load', () => {
  document.querySelectorAll('[data-popup-toggle]').forEach((trigger) =>
    trigger.addEventListener('click', () => {
      const popup_toggle = document.querySelector('[data-popup-toggle]');
      const popup = document.querySelector('[data-popup-show]');
      const body = document.querySelector('[data-popup-body]');
      const buttons = document.querySelector('[data-buttons-hide]');
      const header = document.querySelector('[data-header-hide]');
      if (!body) {
        return false;
      }
      popup.classList.toggle('popup-expand');
      body.classList.toggle('popup-body');
      buttons.classList.toggle('popup-body');
      header.classList.toggle('hide');
      buttons.classList.toggle('hide');
      trigger.classList.toggle('hide');
      //popup_toggle.classList.toggle('hide');


      trigger.setAttribute('aria-expanded', trigger.classList.contains('popup-expand') ? 'true' : 'false');
      body.setAttribute('aria-visible', body.classList.contains('popup-body') ? 'true' : 'false');
      popup.setAttribute('aria-visible', popup.classList.contains('popup-show') ? 'true' : 'false');

      return false;
    })
  );
});