pipeline {
    agent any

    environment {
        COMPOSE_PROJECT_NAME = 'yap-app-deployment'
    }

    stages {
        stage('Prepare') {
            steps {
                sh '''
                    mkdir -p docker/nginx/conf.d
                    touch database/database.sqlite || true
                    chmod 664 database/database.sqlite
                '''
            }
        }

        stage('Checkout') {
            steps {
                checkout scm
            }
        }

        stage('Build') {
            steps {
                sh 'docker compose build'
            }
        }

        stage('Deploy') {
            steps {
                sh '''
                    docker compose down || true
                    docker compose up -d
                    
                    # Tunggu container ready
                    sleep 10
                    
                    # Jalankan migration dan setup Laravel
                    docker compose exec -T app php artisan migrate --force
                    docker compose exec -T app php artisan optimize:clear
                '''
            }
        }
    }

    post {
        always {
            sh 'docker compose ps'
            cleanWs()
        }
    }
}