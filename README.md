# Employee Task Management System

A web-based Task Management System built with **PHP** and **MySQL**. This application is designed to help organizations, specifically clubs and their members, efficiently manage tasks, projects, and member roles. It features a role-based architecture ensuring secure and organized workflow management.

## 🚀 Key Features

*   **Role-Based Access Control (RBAC):** Distinct dashboards and functionalities for different user roles:
    *   **Authority (System Admin):** Manage clubs, assign club admins, and oversee the entire system.
    *   **Club Admin:** Manage club members, assign tasks, and track club-specific activities.
    *   **Club Member (Employee):** View assigned tasks, update status, and track personal progress.
*   **Club Management:** Create and manage multiple clubs, each with its own workspace.
*   **Task Management:**
    *   Create, edit, and delete tasks.
    *   Assign tasks to specific club members.
    *   Set due dates and track status (Pending, In Progress, Completed).
*   **Notifications:** Real-time notifications for task assignments and updates.
*   **Dashboards:** Interactive and insightful dashboards displaying key metrics like overdue tasks, pending tasks, and completion rates.
*   **User Management:** Add, edit, and remove users.
*   **Profile Management:** Users can update their profiles and change passwords.
*   **Responsive Design:** Accessible on various devices.

## 🛠️ Technologies Used

*   **Frontend:** HTML5, CSS3, JavaScript (jQuery)
*   **Backend:** PHP (Native)
*   **Database:** MySQL
*   **Server:** Apache (XAMPP/WAMP recommended)
*   **Styling:** Custom CSS, FontAwesome for icons

## 📦 Installation & Setup

1.  **Prerequisites:**
    *   Install a local server environment like [XAMPP](https://www.apachefriends.org/index.html), [WAMP](http://www.wampserver.com/en/), or [MAMP](https://www.mamp.info/).

2.  **Clone the Repository:**
    ```bash
    git clone https://github.com/yourusername/Employee-Task-Management-System.git
    ```
    Or download the ZIP file and extract it to your server's root directory (e.g., `htdocs` in XAMPP).

3.  **Database Setup:**
    *   Open `phpMyAdmin` (typically at `http://localhost/phpmyadmin`).
    *   Create a new database named `task_management_db`.
    *   Import the `task_management_db.sql` file located in the root directory of this project into your new database.

4.  **Configuration:**
    *   Open `DB_connection.php` and ensure the database credentials match your local setup:
        ```php
        $sName = "localhost";
        $uName = "root";
        $pass  = "";
        $db_name = "task_management_db";
        ```

5.  **Run the Application:**
    *   Open your browser and navigate to `http://localhost/EWU_club_event_organizer`.

## 🔑 Default Login Credentials

*   **Authority/Admin:**
    *   Username: `authority`
    *   Password: `123` (or as defined in your database)
*   **Club Admin:**
    *   Username: `admin`
    *   Password: `123`
*   **Club Member:**
    *   Username: `shakur`
    *   Password: `123`

*(Note: Please check the `users` table for exact usernames if these do not work. Passwords in the database are hashed.)*

## 📂 Project Structure

```
├── app/                # Backend logic and models
├── css/                # Stylesheets
├── inc/                # Reusable UI components (header, nav)
├── DB_connection.php   # Database connection file
├── index.php           # Main dashboard
├── login.php           # Authentication page
├── tasks.php           # Task management interface
└── task_management_db.sql # Database schema
```

## 🤝 Contributing

Contributions, issues, and feature requests are welcome!

1.  Fork the Project
2.  Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3.  Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4.  Push to the Branch (`git push origin feature/AmazingFeature`)
5.  Open a Pull Request

## 📄 License

This project is open-source and available under the [MIT License](LICENSE).

