# Utilisez une image de base contenant Node.js
FROM node:14-alpine

# Définir le répertoire de travail à l'intérieur du conteneur
WORKDIR /app

# Copier les fichiers package.json et package-lock.json pour installer les dépendances
COPY package*.json ./

# Installer les dépendances du projet
RUN npm install

# Copier tous les fichiers du projet dans le répertoire de travail
COPY . .

# Exposer le port sur lequel le serveur Express écoute
EXPOSE 3000

# Définir la commande de démarrage du conteneur
CMD ["npm", "start"]
