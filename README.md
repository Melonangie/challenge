# challenge
Drupal code challenge

# Setup local
Follow [setup](https://ddev.readthedocs.io/en/stable/users/cli-usage/#drupal-9-quickstart).

    mkdir drupal9
    cd drupal9
    ddev config --project-type=drupal9 --docroot=web --create-docroot
    ddev start
    ddev composer create "drupal/recommended-project" --no-install
    ddev composer require drush/drush --no-install
    ddev composer install
    ddev drush site:install -y
    ddev drush uli

Add drupal console to the
