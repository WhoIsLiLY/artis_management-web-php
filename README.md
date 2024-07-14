# Artist Management Website
A fully working website that allows you to reorganize artist data and schedule. This website have 3 different roles of access (Admin, Manager, Artist).

## Features

- User data are fully encrypted (sodium) and hashed (SHA)
- Login using OTP (the otp code also encrypted)
- CRUD for artists and managers data

## Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/your-username/your-repo-name.git
    ```

2. Navigate into the project directory:
    ```bash
    cd ARTIST_PROJECT
    ```

3. Install the dependencies:
    ```bash
    npm install
    ```

4. Add the database:
    ```bash
    artist_db.sql
    ```

5. Run mysql and apache server:
    ```bash
    Run it through xampp or 'php -S localhost:3000'
    ```
5. Run mysql and apache server:
    - Active the sodium extension from your php.ini
    - Add sodium in setting.json (you can access it from ctrl+shift+P in vs code)
    ```bash
    {
    "code-runner.runInTerminal": true,
    "window.zoomLevel": 1,
    "code-runner.ignoreSelection": true,
    "tabnine.experimentalAutoImports": true,
    "chatgpt.lang": "en",
    "workbench.iconTheme": "material-icon-theme",
    "[php]": {
        "editor.defaultFormatter": "bmewburn.vscode-intelephense-client"
    },
    "php.stubs": [
        "*",
        "pcntl",
        "sodium",
        "apcu",
        "gd"
    ],
    "prisma.showPrismaDataPlatformNotification": false
}
    ```
7. Access the /public/index.html?type=optional.
    ```
    optional: artist/manager/admin
    depends on your need
    ```

## Purpose

This project is focused on using PHP only without using any other backend frameworks. 

