# imob soft
Projeto de desenvolvimento PHP com PDO simulando um sistema imobiliário imob soft

### Instalação
- Clonar esse repositório dentro de uma pasta `/imobsoft` dentro da pasta www do servidor local Wamp, Lamp ou semelhantes.

#### Banco de dados
- Criar uma database chamada `imobsoft`
- Criar tabelas de acordo com o `dump.sql` que se encontra na raiz do projeto
- Configurar credenciais no arquivo `/app/config/database.php` do projeto

Acessar através do endereço local http://localhost/imobsoft/index

------

### Funcionalidades
- Cadastro de clientes;
- Cadastro de imóveis;
- Cadastro de proprietários;
- Gerenciamento de contratos;

#### Funcionalidades futuras
- Login e controle de acesso;
- Validações de dados;
- Validações de formulários;
- Páginas de erro (404, 500);
- Mensagens de erro
- Mensagens de confirmação de ações, como exclusões.

### Tecnologias utilizadas
- PHP 8;
- MySQL 8.0.24
- Apache 2.4

### Bibliotecas utilizadas
- Bootstrap 5.2
- JQuery 1.11.0
- JQuery inputmask
- JQuery maskmoney

### Padrões utilizados
- MVC básico
- PDO
