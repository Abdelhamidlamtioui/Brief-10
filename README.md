# Wiki Content Management System

This project aims to develop a content management system for a wiki, providing an efficient platform for creating, managing, and sharing wiki articles. It includes both a back-office interface for administrators to manage categories, tags, and wikis, as well as a user-friendly front-end interface for authors and visitors to interact with the platform.

## Project Context
Wiki requires an efficient content management system combined with a user-friendly front-end to offer an exceptional user experience.

The system should allow administrators to easily manage categories, tags, and wikis while providing authors with the ability to create, edit, and delete their own content.

On the front-end side, the focus will be on a user interface with features such as simplified registration, an efficient search bar, and dynamic displays of the latest wikis and categories for easy navigation.

The main goal is to create a place where everyone can collaborate, create, find, and share wikis in an easy and engaging manner.

## Key Features

### Back Office:

- Category Management (admin):
  - Administrators can create, edit, and delete categories to organize the content effectively.
  - Multiple wikis can be associated with a category.

- Tag Management (admin):
  - Administrators can create, edit, and delete tags to facilitate content search and grouping.
  - Tags are associated with wikis for more precise navigation.

- Author Registration:
  - Authors can register on the platform by providing basic information such as name, email address, and secure password.

- Wiki Management (authors and admins):
  - Authors can create, edit, and delete their own wikis.
  - Authors can associate a single category and multiple tags with their wikis for better organization and searchability.
  - Administrators have the ability to archive inappropriate wikis to maintain a safe and relevant environment.

- Dashboard Homepage:
  - Provides statistics on entities through the dashboard.

### Front Office:

- Login and Register:
  - Users can create an account (register) by providing basic information and log in to their existing accounts.
  - If the user has an administrator role, they will be redirected to the dashboard page. Otherwise, they will be redirected to the homepage.

- Search Bar:
  - A search bar allows visitors to search for wikis, categories, and tags without page refresh (using AJAX).

- Latest Wikis Display:
  - The homepage or a dedicated section displays the most recent wikis added to the platform, providing users with quick access to the latest content.

- Latest Categories Display:
  - A separate section presents the latest categories created or updated, allowing users to quickly discover recently added themes on the platform.

- Redirect to Wiki Single Page:
  - Clicking on a wiki redirects users to a dedicated page that provides complete details such as content, associated categories, tags, and author information.

## Technologies Used

- Frontend: HTML5, Tailwind CSS, JavaScript
- Backend: PHP 8 with MVC (Model-View-Controller) architecture
- Database: PDO driver for connecting to the database

## Installation

1. **Clone the repository:**

   ```bash
   git clone https://github.com/Abdelhamidlamtioui/Brief-10.git
   ```
2. **Set up the database:**
   - Import the `database/database.sql` file into your MySQL database.
   - Update the database configuration in the `app/config.php` file.

3. **Run the application:**
   - Make sure you have PHP installed on your system.
   - Start a local PHP development server:
   ```bash
   php -S localhost:8000 -t public/
   ```
4. **Open your web browser** and visit `http://localhost:8000` to access the application.

## Contributing

Contributions are welcome! If you find any bugs or want to improve the project, please submit an issue or a pull request.

## Acknowledgements

- [Tailwind CSS](https://tailwindcss.com) - A utility-first CSS framework.
- [PHP](https://www.php.net) - A popular server-side scripting language.
- [MySQL](https://www.mysql.com) - An open-source relational database management system.
- [PDO](https://www.php.net/manual/en/book.pdo.php) - PHP Data Objects, a database abstraction layer.
- [Git](https://git-scm.com) - A distributed version control system.

## Contact

For any inquiries or questions, please contact simonmsami99@gmail.com.
