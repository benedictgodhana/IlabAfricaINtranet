<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Template Page - iLab</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <style>
    /* General Reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background-color: #f4f4f4;
      color: #333;
    }

    a {
      text-decoration: none;
      color: inherit;
    }

    /* Container */
    .container {
      max-width: 1000px;
      margin: 0 auto;
      padding: 20px;
    }

    /* Breadcrumb */
    .breadcrumb-container {
      padding: 10px 0;
    }

    .breadcrumb-container nav {
      font-size: 14px;
      color: #6c757d;
    }

    .breadcrumb-container nav a {
      color: #007bff;
    }

    /* Page Title */
    .page-title {
      text-align: center;
      padding: 20px 0 10px;
    }

    .page-title h1 {
      font-size: 24px;
      color: #333;
      font-weight: 600;
    }

    /* Template Categories */
    .template-categories {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      margin: 20px 0;
    }

    .category-btn {
      background-color: #e0e0e0;
      border: none;
      padding: 10px 20px;
      border-radius: 20px;
      cursor: pointer;
      color: #333;
      font-weight: 500;
      margin: 5px;
    }

    .category-btn.active,
    .category-btn:hover {
      background-color: darkblue;
      color: #fff;
    }

    /* Template List */
    .template-list {
      list-style-type: none;
      padding: 0;
      margin-top: 20px;
    }

    .template-list li {
      background: #fff;
      padding: 15px;
      margin: 10px 0;
      border-radius: 8px;
    }

    .template-list h3 {
      font-size: 18px;
      font-weight: 600;
      margin-bottom: 5px;
    }

    .template-list p {
      font-size: 14px;
      color: #666;
      font-weight: 400;
    }

    /* Hidden Class */
    .hidden {
      display: none;
    }
  </style>
</head>
<body>

  <div class="container">
    <!-- Breadcrumb -->
    <header class="breadcrumb-container">
      <nav>
        <a href="/" style="color:darkblue">Home</a> / <span>Templates</span>
      </nav>
    </header>

    <!-- Page Title -->
    <section class="page-title">
      <h1>Explore Our Template Collection</h1>
      <p>Select a category to find the templates you need for your documents and presentations.</p>
    </section>

    <!-- Template Categories -->
    <div class="template-categories">
      <button class="category-btn active" onclick="showTemplates('all')">All Templates</button>
      <button class="category-btn" onclick="showTemplates('word')">Word Document Templates</button>
      <button class="category-btn" onclick="showTemplates('presentation')">Presentation Templates</button>
    </div>

    <!-- Templates List -->
    <ul id="all-templates" class="template-list">
      <li>
        <h3>Project Proposal Template</h3>
        <p>A professional Word document template to create project proposals with sections for objectives, timelines, and budgets.</p>
        <a href="#" class="download-btn">Download Word Template</a>
      </li>
      <li>
        <h3>Research Report Template</h3>
        <p>This Word template is designed for writing detailed research reports, including abstract, methodology, and results.</p>
        <a href="#" class="download-btn">Download Word Template</a>
      </li>
      <li>
        <h3>Business Presentation Template</h3>
        <p>A sleek presentation template for PowerPoint, perfect for pitching ideas and showcasing business plans.</p>
        <a href="#" class="download-btn">Download Presentation Template</a>
      </li>
      <li>
        <h3>Academic Presentation Template</h3>
        <p>This template is tailored for academic presentations, featuring clean designs for effective information delivery.</p>
        <a href="#" class="download-btn">Download Presentation Template</a>
      </li>
    </ul>

    <ul id="word-templates" class="template-list hidden">
      <li>
        <h3>Project Proposal Template</h3>
        <p>A professional Word document template to create project proposals with sections for objectives, timelines, and budgets.</p>
        <a href="#" class="download-btn">Download Word Template</a>
      </li>
      <li>
        <h3>Research Report Template</h3>
        <p>This Word template is designed for writing detailed research reports, including abstract, methodology, and results.</p>
        <a href="#" class="download-btn">Download Word Template</a>
      </li>
    </ul>

    <ul id="presentation-templates" class="template-list hidden">
      <li>
        <h3>Business Presentation Template</h3>
        <p>A sleek presentation template for PowerPoint, perfect for pitching ideas and showcasing business plans.</p>
        <a href="#" class="download-btn">Download Presentation Template</a>
      </li>
      <li>
        <h3>Academic Presentation Template</h3>
        <p>This template is tailored for academic presentations, featuring clean designs for effective information delivery.</p>
        <a href="#" class="download-btn">Download Presentation Template</a>
      </li>
    </ul>
  </div>

  <script>
    function showTemplates(category) {
      const allTemplates = document.getElementById('all-templates');
      const wordTemplates = document.getElementById('word-templates');
      const presentationTemplates = document.getElementById('presentation-templates');

      allTemplates.classList.add('hidden');
      wordTemplates.classList.add('hidden');
      presentationTemplates.classList.add('hidden');

      document.querySelectorAll('.category-btn').forEach(btn => btn.classList.remove('active'));

      if (category === 'all') {
        allTemplates.classList.remove('hidden');
      } else if (category === 'word') {
        wordTemplates.classList.remove('hidden');
      } else if (category === 'presentation') {
        presentationTemplates.classList.remove('hidden');
      }

      document.querySelector(`.category-btn[onclick="showTemplates('${category}')"]`).classList.add('active');
    }

    // Initial load
    showTemplates('all');
  </script>

</body>
</html>
