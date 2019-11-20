=== Jetimob Leads API ===
Tags: contact form 7 to api,contact form 7,cf7 api,cf7 get,contact form 7 post,contact form7 get,contact form 7 remote, Contact form 7 crm, contact form 7 integration,contact form 7 integrations, contact form 7 rest api, jetimob contact form 7, jetimob leads api
Requires at least: 4.7.0
Tested up to: 4.9.4
Stable tag: 1.0.3
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Integração com Leads do CRM Imobiliário Jetimob.

== Descrição ==

Realiza a integração com a API JSON do CRM Imobiliário Jetimob, enviando dados de formulário de contato para o Jetimob.
NOTA: Este plugin requer o Contact Form 7 versão 4.2 ou mais recente.


== Utilização ==

Configure os dados solicitados no formulário de contato no qual deseja integrar. É necessário possuir uma assinatura de um plano Jetimob que permita acesso a API.


== Instalação ==

Baixe a versão mais recente no Github e faça upload do arquivo zip. Após a instalação e ativação, configure a integração diretamente no formulário que deseja integrar.

== FAQ ==

= O plugin não envia dados para a API, o que fazer? =
Verifique se todos os campos da configuração foram preenchidos e estão corretos. Verifique também se a mensagem enviada está na formatação especificada. O código de erro 400 pode significar que existe algum erro na formatação da mensagem e o código de erro 403 pode indicar que os dados da URL de envio e a chave de autorização estejam incorretos ou inválidos. Caso receba algum código de erro diferente deste, verifique com o suporte do Jetimob se o IP do seu servidor está bloqueado no Firewall da API.


== Changelog ==

= 1.0.5 =
* Ajuste no mecanismo de atualização.

= 1.0.4 =
* Definição de requisitos mínimos de PHP para utilização do plugin. Se não atendidos, a instalação falha. (PHP 7.2.24 e WP 4.8).
* Inclusão de método de atualização direta via GitHub


= 1.0.3 =
* Correção na geração do header da requisição, que poderia ocasionar em alguns cenários a falha na autenticação com a API do Jetimob.

= 1.0.2 =
* Correção de bugs.

= 1.0.1 =
* Correção de bugs.

= 1.0.0 =
* Release inicial.

~Current Version:1.0.5~
