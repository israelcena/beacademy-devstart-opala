
# E-commerce Doceria - Squad Opala
[![PHP 8][Php.com]][Php-url]
[![Mysql][Mysql.com]][Mysql-url]
[![NodeJS][Nodejs.com]][Nodejs-url]
[![Laravel][Laravel.com]][Laravel-url]
[![Bootstrap][Bootstrap.com]][Bootstrap-url]
[![TailwindCss][TailwindCss.com]][TailwindCss-url]


## :newspaper: Business project 

Criar um **CHECKOUT** para uma **PLATAFORMA** de **VENDAS ONLINE**

Este checkout será criado em PHP, utilizando a Framework Laravel

*O contexto deste projeto é mínimo no que diz respeito a operações de e-commerce e foca na efetivação do pagamento, portanto questões como logística, descontos e afins não serão levados em consideração na descrição e execução do projeto.*

## :gear: Installation

### :one: Initial Settings:

```bash
  git clone https://github.com/israelcena/beacademy-devstart-opala.git
  
  cd beacademy-devstart-opala
  
  composer install

  # Renomear arquivo '.env.example' para '.env' e ajustar configurações internas caso ache necessário

  php artisan key:generate
  
  php artisan breeze:install
 
  npm install
  
  npm run dev
  
  php artisan migrate
```

### :arrows_counterclockwise: Update with the latest version:

```bash
  git pull origin main
  
  php artisan storage:link
  
  php artisan optimize
  
  php artisan migrate

  composer install
```
## ✅ Tasks and Requirements:

- [x] Banco de dados Mysql
- [x] Autenticação e Cadastro de Usuários
- [x] Cadastro de Produtos
- [x] Cadastro de Pedidos
- [x] Checkout
- [ ] Api da **Paylivre** para efetivação dos pagamentos (anexar documentação)
- [ ] Criação de testes unitários para todas as regras de negócio

## Squad Members

<table>
  <tr>
    <td align="center">
      <a href="https://github.com/israelcena">
        <img src="https://github.com/israelcena.png" width="100px;" alt="Israel Cena"/><br>
        <sub>
          <b>Israel Cena</b>
        </sub>
      </a>
    </td>
    <td align="center">
      <a href="https://github.com/attiasdan">
        <img src="https://github.com/attiasdan.png" width="100px;" alt="Daniel Attias"/><br>
        <sub>
          <b>Daniel Attias</b>
        </sub>
      </a>
    </td>
    <td align="center">
      <a href="https://github.com/camilaftin">
        <img src="https://github.com/camilaftin.png" width="100px;" alt="Camilla F Tinelli"/><br>
        <sub>
          <b>Camilla F Tinelli</b>
        </sub>
      </a>
    </td>
    <td align="center">
      <a href="https://github.com/adrianoarch">
        <img src="https://github.com/adrianoarch.png" width="100px;" alt="Adriano de Oliveira"/><br>
        <sub>
          <b>Adriano de Oliveira</b>
        </sub>
      </a>
    </td>
    <td align="center">
      <a href="https://github.com/Wendeldev87">
        <img src="https://github.com/Wendeldev87.png" width="100px;" alt="Wendel Duarte"/><br>
        <sub>
          <b>Wendel Duarte</b>
        </sub>
      </a>
    </td>            
    <td align="center">
      <a href="https://github.com/ErikMacedo">
        <img src="https://github.com/ErikMacedo.png" width="100px;" alt="Erik Macêdo"/><br>
        <sub>
          <b>Erik Macêdo</b>
        </sub>
      </a>
    </td>
  </tr>
</table>


<!-- LINKS & IMAGES -->
[Php.com]: https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white
[Php-url]: https://www.php.net

[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com

[Mysql.com]: https://img.shields.io/badge/MySQL-00000F?style=for-the-badge&logo=mysql&logoColor=white
[Mysql-url]: https://www.mysql.com

[Nodejs.com]: https://img.shields.io/badge/Node.js-43853D?style=for-the-badge&logo=node.js&logoColor=white
[Nodejs-url]: https://nodejs.org/en/

[TailwindCss.com]: https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white
[TailwindCss-url]: https://tailwindcss.com

[Bootstrap.com]: https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white
[Bootstrap-url]: https://getbootstrap.com

