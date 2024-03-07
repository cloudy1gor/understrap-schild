## Understrap-child theme template
The project is available at **https://savelyev.000webhostapp.com/**

### Project information
1.The site name and copyright are edited on the Settings page. 

![ScreenShot](/adm.png)

2.Posts in slider have custom post type (carousel).

![ScreenShot](/cpt.png)

3. Sidebar displays custom shortcodes to display a post with author information and a shortcode to display a list of categories with post count.

![ScreenShot](/sidebar.png)

## Dependencies
You need to use **Nodejs v14.17.3** for Gulp to work properly.
- You can use the [NVM](https://github.com/nvm-sh/nvm?tab=readme-ov-file#installing-and-updating) utility to install and manage NodeJS versions.
- [Gulp](https://gulpjs.com/) and [WebPack](https://webpack.js.org/) will also be needed
- You need [Docker](https://docs.docker.com/desktop/install/windows-install/) for the server to work properly
```sh
nvm install 14.17.3

nvm use 14.17.3

npm install --global gulp-cli webpack
```

## How to start?
1.From the project directory, you need to execute the commands:
```sh
docker-compose up --build -d
```

2.Import the database using PHPMyAdmin
Open in your browser the page at http://localhost:8081/


3.The project will now be available in the browser at:
http://localhost:8001

If you want to run the task runner, you need to launch a second console in the project directory and run the command:

```sh
cd src/themes/understrap-child

gulp
```
![ScreenShot](/screenshot.png)
