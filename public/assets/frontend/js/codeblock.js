(function () {
     $(".code-block [style]").removeAttr("style");
     $(".code-block pre > pre").unwrap();
     for (var tags = ['div', 'figure', 'figcaption'], i = 0; i < tags.length; i++) {
          document.createElement(tags[i]);
     }
})();

// Wait for the DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function () {
     // Get all pre elements
     var preElements = document.querySelectorAll('pre');

     preElements.forEach(function (pre) {
          // Find the first code or samp element within the pre element
          var code = pre.querySelector('code, samp');

          if (code) {
               // Create a container for line numbers
               var column = document.createElement('div');
               column.classList.add('numbers');

               // Split the code by line breaks to count the number of lines
               var lines = code.textContent.split(/\r\n|\r|\n/);

               for (var i = 0; i < lines.length; i++) {
                    var span = document.createElement('span');
                    span.textContent = i + 1; // Line numbers start at 1
                    column.appendChild(span);
               }

               // Insert the line numbers column before the code element
               pre.insertBefore(column, code);
          }
     });
});
