# Disaster Report Management System

This web application is designed to help manage disaster safety information, government policies, resource allocation, and community engagement during disaster scenarios. The system allows government officials to create policies, allocate resources, and provide necessary information to community members and emergency responders.

## Table of Contents

- [Features](#features)
- [Project Structure](#project-structure)
- [Installation](#installation)
- [Usage](#usage)
- [Technologies Used](#technologies-used)
- [Contributing](#contributing)
- [License](#license)

## Features

- **Disaster Safety Information:** Displays a searchable table of various disaster types, descriptions, shelter locations, emergency contact numbers, and guidelines.
- **Government Official Functions:** Allows officials to add and view policies and allocate resources.
- **Community Information:** Provides community members with access to policies and available resources.

## Project Structure

```
.
├── analysis.php
├── assets
│   ├── css
│   │   ├── bootstrap.min.css
│   │   ├── bootstrap.min.css.map
│   │   ├── paper-dashboard.css
│   │   ├── paper-dashboard.css.map
│   │   └── paper-dashboard.min.css
│   ├── demo
│   │   ├── demo.css
│   │   └── demo.js
│   ├── fonts
│   │   ├── nucleo-icons.eot
│   │   ├── nucleo-icons.ttf
│   │   ├── nucleo-icons.woff
│   │   └── nucleo-icons.woff2
│   ├── img
│   │   ├── apple-icon.png
│   │   ├── bg5.jpg
│   │   ├── damir-bosnjak.jpg
│   │   ├── default-avatar.png
│   │   ├── faces
│   │   │   ├── ayo-ogunseinde-1.jpg
│   │   │   ├── ayo-ogunseinde-2.jpg
│   │   │   ├── clem-onojeghuo-1.jpg
│   │   │   ├── clem-onojeghuo-2.jpg
│   │   │   ├── clem-onojeghuo-3.jpg
│   │   │   ├── clem-onojeghuo-4.jpg
│   │   │   ├── erik-lucatero-1.jpg
│   │   │   ├── erik-lucatero-2.jpg
│   │   │   ├── joe-gardner-1.jpg
│   │   │   ├── joe-gardner-2.jpg
│   │   │   ├── kaci-baum-1.jpg
│   │   │   └── kaci-baum-2.jpg
│   │   ├── favicon.png
│   │   ├── header.jpg
│   │   ├── jan-sendereks.jpg
│   │   ├── logo-small.png
│   │   └── mike.jpg
│   ├── js
│   │   ├── Chart.js
│   │   ├── core
│   │   │   ├── bootstrap.min.js
│   │   │   ├── jquery.min.js
│   │   │   └── popper.min.js
│   │   ├── paper-dashboard.js
│   │   ├── paper-dashboard.js.map
│   │   ├── paper-dashboard.min.js
│   │   └── plugins
│   │       ├── bootstrap-notify.js
│   │       ├── chartjs.min.js
│   │       └── perfect-scrollbar.jquery.min.js
│   └── scss
│       ├── paper-dashboard
│       │   ├── _alerts.scss
│       │   ├── _animated-buttons.scss
│       │   ├── _buttons.scss
│       │   ├── cards
│       │   │   ├── _card-chart.scss
│       │   │   ├── _card-map.scss
│       │   │   ├── _card-plain.scss
│       │   │   ├── _card-stats.scss
│       │   │   └── _card-user.scss
│       │   ├── _cards.scss
│       │   ├── _checkboxes-radio.scss
│       │   ├── _dropdown.scss
│       │   ├── _fixed-plugin.scss
│       │   ├── _footers.scss
│       │   ├── _images.scss
│       │   ├── _inputs.scss
│       │   ├── _misc.scss
│       │   ├── mixins
│       │   │   ├── _buttons.scss
│       │   │   ├── _cards.scss
│       │   │   ├── _dropdown.scss
│       │   │   ├── _inputs.scss
│       │   │   ├── _page-header.scss
│       │   │   ├── _transparency.scss
│       │   │   └── _vendor-prefixes.scss
│       │   ├── _mixins.scss
│       │   ├── _navbar.scss
│       │   ├── _nucleo-outline.scss
│       │   ├── _page-header.scss
│       │   ├── plugins
│       │   │   ├── _plugin-animate-bootstrap-notify.scss
│       │   │   └── _plugin-perfect-scrollbar.scss
│       │   ├── _responsive.scss
│       │   ├── _sidebar-and-main-panel.scss
│       │   ├── _tables.scss
│       │   ├── _typography.scss
│       │   └── _variables.scss
│       └── paper-dashboard.scss
├── disaster-details.php
├── disaster_details.php
├── disasters.php
├── func
│   ├── disaster_api_call.php
│   ├── disaster-details.php
│   ├── login.php
│   ├── policy.php
│   ├── register.php
│   ├── report-disaster.php
│   ├── resource.php
│   └── response.php
├── included
│   ├── alert.php
│   ├── charts.php
│   ├── footer.php
│   ├── head.php
│   ├── navbar.php
│   ├── scripts.php
│   └── sidebar.php
├── index.php
├── login.php
├── logout.php
├── policy.php
├── README.md
├── register.php
├── report-disaster.php
├── required
│   ├── loadenv.php
│   ├── session.php
│   ├── sql.php
│   └── validate.php
├── resource.php
├── response.php
├── safety-information.php
└── sql
    └── disaster.sql
```

## Installation

1. **Clone the repository:**

    ```bash
    git clone https://github.com/PrimotionStudio/disaster-report-management.git
    cd disaster-report-management
    ```

2. **Open the project:**

    Open the project directory in your preferred code editor (e.g., VSCode).

3. **Serve the project:**

    You can use a simple HTTP server to serve the project locally. If you have apache server installed, you can run it:

    Then, open your browser and navigate to `http://localhost/disaster-report-management`.

## Usage

1. **Search for Disaster Information:**

    - Use the search bar at the top of the page to filter disaster types and find relevant information about shelters, contact numbers, and guidelines.

2. **Add Policies:**

    - Government officials can add new policies using the form in the "Policy Making" section. Enter the policy title and description, then click "Add Policy". The new policy will be displayed in the policy table.

3. **Allocate Resources:**

    - Government officials can allocate resources using the form in the "Resource Allocation" section. Enter the resource type and quantity, then click "Allocate Resource". The new resource will be displayed in the resource table.

4. **View Community Information:**

    - Community members can view policies and resources in the "Community Information" section. This provides them with necessary information during disaster situations.

## Technologies Used

- **HTML5:** For the structure of the web pages.
- **CSS3:** For styling the web pages.
- **JavaScript:** For interactivity and functionality.
- **Bootstrap:** For responsive design and UI components.
- **PHP:** For server side scripting and rendering.
- **MySQL:** For data storage and retrieval.

## Contributing

Contributions are welcome! To contribute to this project, please follow these steps:

1. **Fork the repository:**

    Click the "Fork" button at the top right of this repository's page.

2. **Clone your fork:**

    ```bash
    git clone https://github.com/PrimotionStudio/disaster-report-management.git
    cd disaster-report-management
    ```

3. **Create a branch:**

    ```bash
    git checkout -b feature-branch
    ```

4. **Make your changes and commit them:**

    ```bash
    git commit -m "Description of your changes"
    ```

5. **Push to your fork and submit a pull request:**

    ```bash
    git push origin feature-branch
    ```

6. **Submit your pull request:**

    Go to the original repository on GitHub and create a pull request from your forked repository.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.
