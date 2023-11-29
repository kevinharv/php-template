# PHP Apache Template
This repository serves as a template for a PHP website running on an Apache webserver. The webserver has been containerized along with a MySQL server. The `src` directory contains the application code that is running on the webserver.

# To-Do
- Create GitHub Actions Workflow to build and publish Apache webserver image
- Rebuild Dockerfile with from-scratch Debian distribution - install and configure Apache/PHP manually
- Create site scaffolding
    - Basic site structure
    - Basic PHP actions
    - MySQL DB interactions
    - Create/include styles (Tailwind?)
- Create Kubernetes definitions/Helm Chart

# Deployment
Information on deploying a site based on this template.
// Cloud workflow?
// Manual deployment?
// Required environment variables

# Development
## Environment Variables

**db.env**

Required `.env` file for MySQL database configuration.

| Key | Description |
| --- | ----------- |
| MYSQL_ROOT_PASSWORD | `root` user account password |
| MYSQL_USER | Username for connecting to DB |
| MYSQL_PASSWORD | Password for connecting to specified user |

// Environment setup
// Required environment variables
