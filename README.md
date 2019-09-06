# ACTIVE RECORD com PDO em PHP

Este código fonte apresenta um exemplo de um sistema de ORM feito em PHP, com as 4 operações sobre o banco de dados, cujo conhecemos como CRUD. É utilizado PDO. ORM mapeia uma tabela ou um registro para um objeto.

## Getting Started

O projeto é simples e não requer muito esforço para funcioná-lo

### Prerequisites

Você precisa ter instalado PHP e MySQL Server. Se estiver utilizando Linux, muitas vezes o LAMP lhe apresentará todo ambiente perfeito. No Windows, muitos costumam utilizar o XAMP.
Não faz parte desde documento, apresentar as etapas de instalação de cada elemento do ambiente.

### Installing

Após baixar o código, se estiver compactado, extrai-os e coloque-os no diretório que pode ser lido por um servidor web ou em um diretório de sua preferencia para rodar com o servidor web embutido no php. 

Além disso, você precisa configurar as definições do seu servidor no arquivo configdb.ini:

```ini

; Arquivo de configuração de conexão com o banco de dados
; Driver de conexão
sgdb      = mysql
; Dados para conexão
banco     = active_record
servidor = localhost
porta     = 3306
; Credenciais de usuário
usuario  = root
senha    = P@ssw0rd

```

O que você definir em seu ambiente, deverá refletir aí.


O que você definir em seu ambiente, deverá refletir aí. Então na sequencia, defina o usuário e senha que você utiliza, subistituindo os dados pré-existentes.

Você deve ter acesso ao seu servidor MySQL e executar o seguinte script para criar um novo banco de dados e uma tabela:

```sql
CREATE DATABASE `active_record`;

USE `active_record`;

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `sobrenome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
```


Após isso, você deve estar certo de que o script esteja em um diretório que possa ser lido pelo servidor web local ou, que tenha permissões suficiente de acesso ao diretório para utilizar o servidor embutido do php. 
Em geral para se utilizar o servidor embutido, utiliza-se o seguinte comando no diretório do projeto:

```
php -S localhost:8080

```

Após inicia o servidor embutido, será possível invocar o programa no browser através de um endereço URL como:

```
http://localhost:8080

```

## Usage

Para testar você precisa importar as classes necessárias

```php

include_once 'ActiveRecord.php';
include_once 'Cliente.php';
include_once 'Connection.php';

```

E definir a instância:

```php

Cliente::setConnection(Connection::getInstance('./configdb.ini'));

```

Se tiver algum dado salvo na tabela, poderá listar facilmente usando as definições na Model Cliente:

```php

echo "<pre>";

var_dump(Cliente::listarRecentes(5));

echo "</pre>";

// Mostrar quantos registros existem

echo Cliente::numTotal();

```

Mas se não tiver, pode adicionar novos dados dessa maneira:

```php

$cliente = new Cliente;

$cliente->nome      = 'Silva';
$cliente->sobrenome = 'Silva';
$cliente->email     = 'jsilva@teste.com';
$cliente->telefone  = '113211234';
$cliente->celular  = '11987654321';

$cliente->save();

```

Pode recuperar um registro desta forma

```php

$cliente = Cliente::find(1);

var_dump($cliente);

```

Excluir um cliente encontrado:

```php

$cliente = Cliente::find(1);

$cliente->delete();

```

Pode também listar todos os registros usando o método all:


```php

echo "<pre>";

foreach(Cliente::all() as $cliente)
{
    // Mostar cliente
    var_dump($cliente);
    
    // Excluir cliente
    $cliente->delete();
	
}

echo "</pre>";

// Mostrar quantos registros existem
echo Cliente::numTotal();

```


## Authors

* **Alexandre Bezerra Barbosa**
