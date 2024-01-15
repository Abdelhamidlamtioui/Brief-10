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

- Frontend: HTML5, CSS Framework (e.g., Tailwind CSS), JavaScript
- Backend: PHP 8 with MVC (Model-View-Controller) architecture
- Database: PDO driver for connecting to the database

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/your-username/your-repository.git
