# Desafio

## Passo a Passo

```bash
# 1. Clonar o repositório
git clone https://github.com/matheusssousa/desafio.git
cd desafio

# 2. Instalar dependências PHP
composer install

# 3. Copiar e configurar variáveis de ambiente
cp .env.example .env
# DB_DATABASE=seu_banco
# DB_USERNAME=seu_usuario
# DB_PASSWORD=sua_senha

# 4. Gerar chave de aplicação
php artisan key:generate

# 5. Criar link para o sorage
php artisan storage:link

# 6. Rodar as migrações
php artisan migrate

# 7. Instalar e compilar assets
npm install
npm run dev

# 8. Executar servidor de desenvolvimento
php artisan serve
# abra no navegador:
# http://127.0.0.1:8000

