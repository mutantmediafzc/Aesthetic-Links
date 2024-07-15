<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sortable Data</title>
  <style>
    .data-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      margin-bottom: 10px;
    }
    .data-item {
      border: 1px solid #ddd;
      padding: 10px;
      margin: 5px;
    }
  </style>
  <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-N7QLJTK5');</script>
<!-- End Google Tag Manager -->
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N7QLJTK5"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
  <div class="data-container">
    <div class="data-item" data-text="Apple" data-price="100">Apple ($100)</div>
    <div class="data-item" data-text="Banana" data-price="50">Banana ($50)</div>
    <div class="data-item" data-text="Cherry" data-price="75">Cherry ($75)</div>
  </div>

  <div class="sort-options">
    <label for="sort-by">Sort By:</label>
    <br>
    <input type="radio" id="sort-by-text" name="sort-type" value="text" checked> Text (A-Z)
    <br>
    <input type="radio" id="sort-by-price" name="sort-type" value="price"> Price (Low to High)
    <br>
    <br>
    <label for="sort-order">Sort Order:</label>
    <br>
    <input type="radio" id="sort-asc" name="sort-order" value="asc" checked> Ascending
    <br>
    <input type="radio" id="sort-desc" name="sort-order" value="desc"> Descending
  </div>

  <script>
  function sortItems(container, sortType, sortOrder) {
  const items = container.querySelectorAll('.data-item');

  const sortedItems = Array.from(items).sort((a, b) => {
    let valueA, valueB;
    if (sortType === 'text') {
      valueA = a.dataset.text.toUpperCase();
      valueB = b.dataset.text.toUpperCase();
    } else if (sortType === 'price') {
      valueA = parseFloat(a.dataset.price);
      valueB = parseFloat(b.dataset.price);
    }

    if (sortOrder === 'asc') {
      return valueA - valueB; // Ascending
    } else {
      return valueB - valueA; // Descending
    }
  });

  container.innerHTML = "";
  sortedItems.forEach(item => {
    container.appendChild(item);
  });
}

const sortOptions = document.querySelectorAll('input[name="sort-type"]');
const sortOrder = document.querySelectorAll('input[name="sort-order"]');

sortOptions.forEach(option => {
  option.addEventListener('change', () => {
    const selectedType = option.value;
    const selectedOrder = sortOrder.checked ? sortOrder.checked.value : "asc"; // Use checked radio button's value for sort order
    const container = document.querySelector('.data-container'); // Replace with your container selection logic
    sortItems(container, selectedType, selectedOrder);
  });
});

sortOrder.forEach(option => {
  option.addEventListener('change', () => {
    const selectedType = sortOptions.checked ? sortOptions.checked.value : "text"; // Use checked radio button's value for sort type
    const selectedOrder = option.value;
    const container = document.querySelector('.data-container'); // Replace with your container selection logic
    sortItems(container, selectedType, selectedOrder);
  });
});

// Initial data display (assuming initial sort is "text" and "asc")
sortItems(document.querySelector('.data-container'), "text", "asc");

  </script>
</body>
</html>
