# challenge
Drupal code challenge

# Setup local
Follow [setup steps](https://ddev.readthedocs.io/en/stable/users/cli-usage/#drupal-9-quickstart).

    mkdir drupal9
    cd drupal9
    ddev config --project-type=drupal9 --docroot=web --create-docroot
    ddev start
    ddev composer create "drupal/recommended-project" --no-install
    ddev composer require drush/drush --no-install
    ddev composer install
    ddev drush site:install -y
    ddev drush uli

Add [Drupal console](https://drupalconsole.com/docs/en/commands/) to the composer.json file.

    "require": { . . ., "drupal/console": "~1" }

Update dependencies.

    ddev composer update --with-all-dependencies

To use the console ssh into the web container.

    ddev auth ssh
    ddev ssh
    vendor/bin/drupal

# Create module and entity
Followed the [steps](https://opensenselabs.com/blog/tech/how-create-custom-entity-drupal-8).

    vendor/bin/drupal generate:module
    vendor/bin/drupal generate:entity:content
