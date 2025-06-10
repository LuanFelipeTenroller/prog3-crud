# 🌿 Catálogo de Plantas Ornamentais — Projeto Acadêmico

Este repositório contém um sistema web de **cadastro e gerenciamento de plantas ornamentais**, desenvolvido com **CodeIgniter 4**, **PHP** e **MySQL**. O projeto tem fins acadêmicos e foi pensado para exercitar os conceitos de CRUD, arquitetura MVC e banco de dados relacional.

---

## 👨‍💻 Tecnologias Utilizadas
<table>
  <tr>
    <td><b>PHP 8.x</b></td>
    <td><b>CodeIgniter 4</b></td>
    <td><b>DBeaver</b></td>
    <td><b>MySQL</b></td>
    <td><b>HTML/CSS</b></td>
    <td><b>XAMPP</b></td>
  </tr>
</table>

---

## 🔧 Funcionalidades

- CRUD completo de plantas (nome popular, nome científico, cuidados)
- CRUD de tipos de plantas (Suculentas, Floríferas, Folhagens etc.)
- Marcar e desmarcar plantas como favoritas
- Filtro por tipo de planta
- Relacionamento entre plantas e tipos

---

## 🎨 Visual

- Interface limpa e amigável
- Foco na estética com categorização clara
- Design inspirado em aplicativos de jardinagem

---

## 👥 Integrantes

- **Luan Felipe Tenroller**
- **Luiz Gustavo da Silva Przygoda**
- **Nathaly Camargo do Nascimento**
- **Alcides Antonio Lorenske Neto**

---

### **📦 Estrutura de Pastas**
  * 📁 Docs
    * 📄 Artigo CodeIgniter na Prática: Uso de um CRUD de Plantas Ornamentais
  * 📁 crud-plantas
    * 📄 Projeto em PHP, englobando todas as linguagens e ferramentas utilizadas

---

## ⚙️ Como Configurar o Projeto

### 1. Clonar ou copiar o projeto

Coloque a pasta do projeto no diretório do seu servidor local, como por exemplo:

```
c:\xampp\htdocs\prog3-crud\crud-plantas
```

---

### 2. Criar o banco de dados

Use o phpMyAdmin ou terminal do MySQL:

```sql
CREATE DATABASE plantas_db;
```

---

### 3. Configurar o arquivo `.env`

Renomeie `.env.example` para `.env` (se necessário) e configure os dados do banco de dados:

```ini
app.baseURL = 'http://localhost/crud-plantas/public/'

database.default.hostname = 127.0.0.1
database.default.database = plantas_db
database.default.username = root
database.default.password = SUA_SENHA_DO_MYSQL
database.default.DBDriver = MySQLi
database.default.port = 3306
```

> ⚠️ Se você utiliza o MySQL fora do XAMPP, mantenha apenas o **Apache** do XAMPP rodando.

---

### 4. Instalar dependências (se necessário)

Caso o projeto utilize Composer:

```bash
composer install
```

---

### 5. Rodar as migrations

Abra o terminal na raiz do projeto e execute:

```bash
php spark migrate
```

Isso criará as tabelas necessárias no banco de dados.

---

### 6. Iniciar o servidor

- **Com Apache do XAMPP:**

  Acesse: [http://localhost/crud-plantas/public/](http://localhost/crud-plantas/public/)

- **Com o servidor embutido do CodeIgniter:**

  ```bash
  php spark serve
  ```

  Acesse: [http://localhost:8080/](http://localhost:8080/)

---

## ✅ Observações Finais

- Certifique-se de que as extensões `mysqli` e `pdo_mysql` estão habilitadas no `php.ini`.
- Este projeto é acadêmico, mas pode ser expandido para incluir autenticação, upload de imagens, responsividade e mais filtros avançados.
