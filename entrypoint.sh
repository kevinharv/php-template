#!/bin/bash

# Start Apache in the foreground
apache2ctl -D FOREGROUND &

# Function to gracefully stop Apache on SIGTERM
stop_apache() {
    echo "INFO: Stopping Apache"
    apache2ctl stop
    exit 0
}

# Trap SIGTERM signal and call the stop_apache function
trap 'stop_apache' SIGTERM

# Keep the script running in the background
while true; do
    sleep 1
done
