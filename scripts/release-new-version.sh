#!/bin/sh

# Checking the existence of an argument
if [ "$#" -ne 1 ]; then
    echo "Usage: $0 --arg=VERSION (where VERSION is MAJOR, MINOR, or PATCH)"
    exit 1
fi

# Get the passed argument
arg=$1

# Pre validate version
# Read the current version from the .version file
current_version=$(cat ../.version)

# Read the current tag from GitHub
current_tag=$(git describe --tags --abbrev=0)

# Check if the version in .version matches the current tag in GitHub
if [ "$current_version" != "$current_tag" ]; then
    echo "Error: The version in the .version file ($current_version) does not match the current tag in GitHub ($current_tag)"
    exit 1
fi

# Increasing the version
# Function to increment the version
increment_version() {
    local current_version=$1
    local argument=$2
    IFS='.' read -r -a version_parts <<< "$current_version"
    case $argument in
        "MAJOR") (( version_parts[0]++ )); version_parts[1]=0; version_parts[2]=1 ;;
        "MINOR") (( version_parts[1]++ )); version_parts[2]=1 ;;
        "PATCH") (( version_parts[2]++ )) ;;
    esac
    echo "${version_parts[0]}.${version_parts[1]}.${version_parts[2]}"
}

# Increment the version based on the argument
new_version=$(increment_version "$current_version" "${arg#*=}")

# Write the new version back to the .version file
echo "$new_version" > ../.version

# Create and push a new tag to GitHub
git tag -a "$new_version" -m "X-PHP-SDK-Version: $new_version"
git push origin "$new_version"

exit 0


