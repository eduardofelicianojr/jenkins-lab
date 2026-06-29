pipeline {
   agent any

   stages {

       stage('Checkout') {
           steps {
               checkout scm
           }
       }

       stage('Test PHP') {
           steps {
               sh 'php -l plataforma/processa.php'
           }
       }

       stage('Build') {
           steps {
               sh 'docker compose build'
           }
       }

       stage('Deploy (limpeza forte)') {
           steps {
               sh '''
                   docker compose -p pipeline-cadastro-lab-teste down --remove-orphans || true
                   docker rm -f $(docker ps -q --filter "publish=8080") || true
                   docker compose -p pipeline-cadastro-lab-teste up -d --build
               '''
           }
       }

       stage('Verificar') {
           steps {
               sh 'docker ps'
           }
       }
   }
}