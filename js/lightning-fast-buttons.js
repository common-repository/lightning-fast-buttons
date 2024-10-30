(function() {
  "use strict";

  var shareButtons = document.querySelector('.js-lf-buttons');

  if (shareButtons && lightning_fast_buttons_settings.api_key) {
    querySharedCount();
  }

  /**
   * Call SharedCount.com API for number of shares
   */
  function querySharedCount() {
    var apikey = "f1fb220a7cfd371ad071fd44c7745575397ed2d4";
    var request = new XMLHttpRequest();
    var url = encodeURIComponent(location.href);

    request.open('GET', '//free.sharedcount.com/?apikey=' + lightning_fast_buttons_settings.api_key + '&url=' + url, true);

    request.onload = function() {
      if (this.status >= 200 && this.status < 400) {
        var data = JSON.parse(this.response);
        displayCount('.js-facebook-count', data.Facebook.total_count);
        displayCount('.js-linkedin-count', data.LinkedIn);
        displayCount('.js-google-count', data.GooglePlusOne);
      }
    };

    request.send();
  }

  /**
   * Displays number of shares in a button
   * @param  {string} selector Button selector
   * @param  {number} count   Number of shares
   */
  function displayCount(selector, count) {
    var element = document.querySelector(selector);

    if (element) {
      // Only display counts bigger than zero
      if (count && count > 0) {
        element.innerHTML = count;
        element.classList.add('is-visible');
      }
    }
  }

}());
