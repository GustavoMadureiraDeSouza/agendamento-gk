# BarberPro - Sistema de Agendamento

Sistema web para gerenciamento de uma barbearia, desenvolvido como trabalho acadêmico. Permite controlar clientes, serviços, agendamentos e acompanhar o faturamento mensal.

## Funcionalidades

- **Login** com autenticação de usuário.
- **Dashboard** com totais de clientes, serviços, agendamentos e faturamento do mês, além dos próximos agendamentos.
- **Clientes**: cadastro, listagem, edição e exclusão.
- **Serviços**: cadastro, listagem, edição e exclusão (nome, descrição e preço).
- **Agendamentos**: cadastro, listagem, edição, exclusão e controle de status (Aguardando, Concluído, etc).
- **Faturamento**: relatório dos atendimentos concluídos e soma do valor faturado no mês.

## Tecnologias

- PHP (sem framework, MVC implementado manualmente)
- MySQL / MariaDB (PDO)
- Bootstrap 5 (interface)
- XAMPP (Apache + MySQL) como ambiente de desenvolvimento

## Estrutura do projeto

```
appointment-system/
├── app/
│   ├── controllers/   # Um controller por módulo (Login, Home, Client, Service, Appointment, Finance)
│   ├── models/        # Acesso aos dados (PDO)
│   └── views/         # Templates HTML/PHP, organizados por módulo
├── config/
│   ├── database.php            # Configuração local de conexão (NÃO versionado)
│   └── database.example.php    # Modelo de configuração para copiar
├── public/css/        # Estilos
├── database.sql       # Script de criação do banco e dados iniciais
└── index.php          # Front controller (roteamento via ?controller=&action=)
```

## Como rodar o projeto

1. Copie a pasta do projeto para `htdocs` do XAMPP (ex: `C:\xampp\htdocs\appointment-system`).
2. Inicie o Apache e o MySQL pelo painel do XAMPP.
3. Crie o arquivo de configuração local a partir do exemplo:
   ```
   copy config\database.example.php config\database.php
   ```
   Ajuste `host`, `user` e `password` conforme o seu MySQL, se necessário (por padrão o XAMPP usa `root` sem senha).
4. Importe o banco de dados: abra o phpMyAdmin (`http://localhost/phpmyadmin`) e importe o arquivo `database.sql` — ele cria o banco `appointment_system`, as tabelas e um usuário administrador padrão.
5. Acesse `http://localhost/appointment-system/` no navegador.

### Login padrão (dados de teste do `database.sql`)

- **Usuário:** admin
- **Senha:** 123456

> Recomenda-se trocar/remover esse usuário de teste antes de qualquer uso fora do ambiente acadêmico.

## Observações

- O arquivo `config/database.php` está no `.gitignore` pois contém as credenciais de acesso ao banco — cada ambiente deve ter o seu próprio, gerado a partir de `database.example.php`.
- Projeto desenvolvido para fins de estudo/avaliação em disciplina de faculdade.
