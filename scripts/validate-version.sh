#!/bin/sh

# Read the version from the .version file
version=$(cat ../.version)

# Regular expression to match semantic versioning
semver_pattern="^(0|[1-9]\d*)\.(0|[1-9]\d*)\.(0|[1-9]\d*)(?:-((?:0|[1-9]\d*|\d*[a-zA-Z-][0-9a-zA-Z-]*)(?:\.(?:0|[1-9]\d*|\d*[a-zA-Z-][0-9a-zA-Z-]*))*))?(?:\+([0-9a-zA-Z-]+(?:\.[0-9a-zA-Z-]+)*))?$"

# Check if the version matches the regex
if [[ $version =~ $semver_pattern ]]; then
    exit 0
else
    exit 1
fi