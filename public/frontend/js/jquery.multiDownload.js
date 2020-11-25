(function ($) {

    var methods = {
        _download: function (options) {
            var triggerDelay = (options && options.delay) || 100;
            var cleaningDelay = (options && options.cleaningDelay) || 1000;

            this.each(function (index, item) {
                methods._createIFrame(item, index * triggerDelay, cleaningDelay);
            });
            return this;
        },

        _createIFrame: function (item, triggerDelay, cleaningDelay) {
            setTimeout(function () {
                var frame = $('<iframe style="display: none;" class="multi-download-frame"></iframe>');
                frame.attr('src', $(item).attr('href') || $(item).attr('src'));
                $(item).after(frame);
                setTimeout(function () { frame.remove(); }, cleaningDelay);
            }, triggerDelay);
        }
    };

    function downloadAll(urls) {
      var link = document.createElement('a');

      link.setAttribute('download', null);
      link.style.display = 'none';

      document.body.appendChild(link);

      for (var i = 0; i < urls.length; i++) {
        link.setAttribute('href', urls[i]);
        link.click();
      }

      document.body.removeChild(link);
    }

    $.fn.multiDownload = function(options) {
        return methods._download.apply(this, arguments);
    };

})(jQuery);
