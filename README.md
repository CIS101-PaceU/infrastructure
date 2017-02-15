# Running the application locally

**Using MAMP**
We need an Apache server to run our prototype.
- Download MAMP from [here](https://www.mamp.info/en/downloads/)
- Go to Preferences
- If you want to change the port, go to the Ports tab to do that
- Go to the PHP tab to change the PHP version to 7.0.x
- Go to the Web Server tab to change the document root to where you've forked the repo
- Hit OK
- Click Start Servers to run the server.
- Open the Webstart Page (it may open automatically)
- To access phpmyadmin/mysql, go to Tools
- In phpmyadmin/mysql, create a database 'Red-Velvet'
- Click on the newly created database
- Import the .sql file (leave the default settings)
- Go to the 'user' table to get a username and password to log in (either as Student or Instructor-- you can see who is who in the 'user_role' table)
- In the header navigation on the webstart page, you should see 'My Website' to launch the application
- Log in as either a student or instructor


# Contributing to the application
1. Fork this repository
2. In your fork, create a feature branch off of the `develop` branch
3. **Write some code!** Each team has a "tab" on the portal
4. Rebase your feature branch off of the current `develop` branch. (Other PRs might have been merged while you were **writing some code**)
5. Open a pull request from your feature branch to the `develop` branch of this repository

# Where to Contribute
- Navigate to the "infrastructure -> app -> student" or "infrastructure -> app -> teacher" and the folder with your group name.
- You should see an "index.php" file, that is your starting point.

**Adding Styles**
- If you are using SCSS, please create a new scss file (try to keep it to one file per group) in the "infrastructure -> app -> sass" directory
- If you are using plain CSS, please create a new css file (try to keep it to one file per group) in the "infrastructure -> app -> stylesheets"
- Please do not alter any of the existing SCSS/CSS files