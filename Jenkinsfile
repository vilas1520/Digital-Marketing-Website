pipeline {
    agent any

    stages {
        stage('Clone Repository') {
            steps {
                echo "Cloning project..."
                git 'https://github.com/vilas1520/Digital-Marketing-Website.git'
            }
        }

        stage('Build Docker Image') {
            steps {
                echo "Building Docker image..."
                script {
                    dockerImage = docker.build("digital-marketing-website")
                }
            }
        }

        stage('Run Docker Container') {
            steps {
                echo "Running Docker container..."
                script {
                    sh 'docker rm -f digital-marketing-site || true'
                    sh 'docker run -d --name digital-marketing-site -p 8080:80 digital-marketing-website'
                }
            }
        }
    }
}
