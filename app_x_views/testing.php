<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Keyword Search</title>
  <style>
    
    
  </style>
</head>
<body>
  <input type="text" id="search-box" placeholder="Enter keywords here">
  
    <a href="#" class="div" id="div">Art wilson</a>
    <a href="#" class="div" id="div">Garen ARceus.</a>
    <a href="#" class="div" id="div">Shary</a>
  
  <script>
  const searchBox = document.getElementById("search-box");
  const divs = document.querySelectorAll(".div");

  // Function to filter divs based on search keywords
  function filterDivs(keywords) {
    keywords = keywords.toLowerCase().split(/\s+/); // Split keywords and lowercase
    for (const div of divs) {
      const content = div.textContent.toLowerCase(); // Get content and lowercase
      let matchFound = false;
      for (const keyword of keywords) {
        if (content.includes(keyword)) {
          matchFound = true;
          break; // Stop searching if any keyword matches
        }
      }
      div.style.display = matchFound ? "block" : "none";
    }
  }

  // Event listener for input changes in the search box
  searchBox.addEventListener("input", () => {
    const keywords = searchBox.value.trim(); // Get trimmed search keywords
    filterDivs(keywords); // Call filter function with keywords
  });

  // Show all divs by default on page load
  filterDivs(""); // Empty string to show all divs
  </script>
</body>
</html>
