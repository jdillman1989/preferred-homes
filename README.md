# Blacksmith Boilerpalte

## Getting Started

You need to have [Node.js](https://nodejs.org/en/) and [npm](https://www.npmjs.com/) installed in your machine, these are the dependencies to run the theme.

We're using a `.env` file to create the [Browsersync](https://www.browsersync.io/) proxy, depending on the requirements of the project, this is also our main file for environment configurations like using different API credentials for different environments such as Development, QA, Staging, etc. Create the file `.root` in the root of the theme folder with the following content:

```
DEVELOPMENT_DOMAIN=domain.local
```

The `BROWSERSYNC_PROXY` needs to receive your URL used in Apache, IIS or nginx, usually it can be `localhost` or `yourwebsite.local`. Also ensure that you are including your port if your localhost is configured in such a manner.

After creating your `.env` file, you will need to install all composer dependencies and node dependencies.

```
# Install Composer Dependencies
composer install

# Install Node Dependencies
npm install
```

```
# Build all assets of the website.
npm run build

# Start development environment.
npm start
```

## Structure

### Front End

We're using [Gulp](https://gulpjs.com/) to generate our static files into the `dist` folder. Besides that, we're also using some other tools such as:

- [Babel](https://babeljs.io/)
- [ESLint](https://eslint.org/)
- [StandardJS](https://standardjs.com/)
- [SASS](https://sass-lang.com/)
- [Sytlelint](https://stylelint.io/)

Our preference of plugins is usually the following, but feel free to always recommend and explore new technologies and techniques:

- [Event Emitter](https://nodejs.org/api/events.html)
- [GreenSock](https://greensock.com/)
- [Lodash](https://lodash.com/)
- [Pixi.js](https://www.pixijs.com/)
- [Three.js](https://threejs.org/)

We prefer to use plain JavaScript using ES2015+ syntax, so most of the times try to follow our standards present in the code of this boilerplate by extending `EventEmitter` and creating Object-Oriented Classes that can be reusable accross the applications.

### Back End

We're using [Timber](https://www.upstatement.com/timber/) in our theme, take a look into it's documentation to see the best practices of using it. Timber also uses [Twig](https://twig.symfony.com/) as the template engine for our views, they are present in the `views` folder.
