#!/bin/sh

# Read the current tag from GitHub
current_tag=$(git describe --tags --abbrev=0)

# Read the version from the .version file
version_file=".version"
version=$(cat "$version_file")

# Check if the version in .version matches the current tag in GitHub
if [ "$version" != "$current_tag" ]; then
    echo "Error: The version in the .version file ($version) does not match the current tag in GitHub ($current_tag)"
    exit 1
fi

# If the version matches, send the new tag to GitHub
git tag -a "$version" -m "New version $version"
git push origin "$version"
exit 0
