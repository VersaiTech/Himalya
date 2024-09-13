<!-- Plugin -->
  <!-- jQuery and Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="app-assets/js/plugin/jquery.min.js"></script>
  <script src="app-assets/js/plugin/bootstrap.bundle.min.js"></script>
  <script src="app-assets/js/plugin/swiper-bundle.min.js"></script>
  <script src="app-assets/js/plugin/jquery.mask.min.js"></script>
  <script src="app-assets/js/plugin/autocomplete.min.js"></script>
  <script src="app-assets/js/plugin/moment.min.js"></script>

  <!-- Layouts -->
  <script src="app-assets/js/layouts/header-search.js"></script>
  <script src="app-assets/js/layouts/sider.js"></script>
  <script src="app-assets/js/components/input-number.js"></script>

  <!-- Base -->
  <script src="app-assets/js/base/index.js"></script>
  <!-- Customizer -->
  <script src="app-assets/js/customizer.js"></script>

  <!-- Charts -->
  <script src="app-assets/js/plugin/apexcharts.min.js"></script>
  <script src="app-assets/js/charts/apex-chart.js"></script>

  <!-- Cards -->
  <script src="app-assets/js/cards/card-advance.js"></script>
  <script src="app-assets/js/cards/card-analytic.js"></script>
  <script src="app-assets/js/cards/card-statistic.js"></script>

  <!-- Pages -->
  <script src="app-assets/js/pages/dashboard-ecommerce.js"></script>

  <!-- Custom -->
  <script src="/assets/js/main.js"></script>
  <script>
    
  document.getElementById('copyButton').addEventListener('click', function() {
    // Get the text content of the memberUserId span
    var memberUserId = document.getElementById('memberUserId').innerText;
    
    // Create a temporary input element to copy the text to the clipboard
    var tempInput = document.createElement('input');
    tempInput.value = memberUserId;
    document.body.appendChild(tempInput);
    
    // Select the text and copy it to the clipboard
    tempInput.select();
    document.execCommand('copy');
    
    // Remove the temporary input element
    document.body.removeChild(tempInput);
    
   
  });
  </script>