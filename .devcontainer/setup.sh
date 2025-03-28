#!/bin/bash

# Installer continue.dev
npm install -g @continuehq/cli

# Créer le répertoire de configuration s'il n'existe pas
mkdir -p ~/.continue

# Copier le fichier de configuration continue.dev
cp .devcontainer/continue.config.yaml ~/.continue/config.yaml

# Vérifier l'installation
continue version