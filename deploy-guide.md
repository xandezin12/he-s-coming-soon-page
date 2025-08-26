# 🚀 Guia de Deploy - The Aether Order

## 📋 Checklist Pré-Deploy

### ✅ Arquivos Necessários
```
📁 Pasta raiz do site:
├── index.html
├── admin.html
├── css/styles.css
├── js/global.js
├── js/jquery-1.9.1.min.js
├── js/jquery.countdown.js
├── api/subscribe.php
├── api/simple-get.php
├── api/export-csv.php
└── data/ (pasta vazia - será criada automaticamente)
```

### ⚙️ Configurações Necessárias

1. **Criar pasta `data/` com permissões de escrita**
2. **Verificar se PHP está ativo no servidor**
3. **Testar se as APIs funcionam**

## 🌐 Hospedagem Gratuita - InfinityFree

### Passo 1: Criar Conta
1. Acesse: https://infinityfree.net
2. Clique em "Create Account"
3. Escolha um subdomínio: `seusite.infinityfreeapp.com`

### Passo 2: Upload dos Arquivos
1. Acesse o painel de controle
2. Vá em "File Manager"
3. Entre na pasta `htdocs/`
4. Faça upload de TODOS os arquivos do projeto

### Passo 3: Configurar Permissões
1. Crie a pasta `data/` no File Manager
2. Clique com botão direito na pasta `data/`
3. Altere permissões para `755` ou `777`

### Passo 4: Testar
- Site: `https://seusite.infinityfreeapp.com`
- Admin: `https://seusite.infinityfreeapp.com/admin.html`

## 💰 Hospedagem Paga - Hostinger

### Passo 1: Comprar Hospedagem
1. Acesse: https://hostinger.com.br
2. Escolha plano "Premium" ou "Business"
3. Registre um domínio (ex: `theaetherorder.com`)

### Passo 2: Configurar cPanel
1. Acesse o cPanel da sua conta
2. Vá em "File Manager"
3. Entre na pasta `public_html/`

### Passo 3: Upload via FTP (Recomendado)
```bash
# Use FileZilla ou WinSCP
Host: ftp.seudominio.com
Usuário: seu_usuario
Senha: sua_senha
Porta: 21
```

### Passo 4: Configurar Banco (Opcional)
Se quiser usar MySQL em vez de arquivo:
1. cPanel → MySQL Databases
2. Crie banco e usuário
3. Modifique os arquivos PHP

## 🔧 Configurações Específicas

### Para InfinityFree:
```php
// No início dos arquivos PHP, adicione:
<?php
error_reporting(0);
ini_set('display_errors', 0);
```

### Para Hostinger:
```php
// Configuração padrão já funciona
// Apenas certifique-se que a pasta data/ existe
```

## 🧪 Testando o Deploy

### Checklist de Testes:
- [ ] Site principal carrega
- [ ] Countdown funciona
- [ ] Formulário envia email
- [ ] Admin dashboard carrega
- [ ] Estatísticas aparecem
- [ ] Export CSV funciona

### URLs para Testar:
- `seusite.com/` - Página principal
- `seusite.com/admin.html` - Dashboard
- `seusite.com/api/simple-get.php` - API (deve retornar JSON)
- `seusite.com/debug.php` - Teste de funcionamento

## 🚨 Problemas Comuns

### "Erro 500 - Internal Server Error"
```bash
Solução:
1. Verificar permissões da pasta data/ (755 ou 777)
2. Verificar se PHP está ativo
3. Adicionar error_reporting(0) nos arquivos PHP
```

### "Formulário não funciona"
```bash
Solução:
1. Verificar se a pasta data/ existe
2. Testar a API diretamente: seusite.com/api/simple-get.php
3. Verificar console do navegador (F12)
```

### "Admin não carrega dados"
```bash
Solução:
1. Criar arquivo de teste em data/subscribers.txt
2. Verificar permissões de escrita
3. Testar API: seusite.com/api/simple-get.php
```

## 🎯 Domínio Personalizado

### Registrar Domínio:
- **Registro.br** (para .com.br)
- **GoDaddy** (para .com)
- **Namecheap** (barato)

### Configurar DNS:
```
Tipo: A
Nome: @
Valor: IP_DO_SERVIDOR (fornecido pela hospedagem)

Tipo: CNAME  
Nome: www
Valor: seudominio.com
```

## 📧 Configurar Email (Opcional)

Para receber notificações por email:
1. Crie email no cPanel: admin@seudominio.com
2. Configure SMTP no config.php
3. Teste o envio

## 🔒 SSL Gratuito

### InfinityFree:
- SSL já incluído automaticamente

### Hostinger:
1. cPanel → SSL/TLS
2. Ativar "Let's Encrypt"
3. Aguardar propagação (até 24h)

---

## 🎉 Site no Ar!

Após seguir estes passos, seu site estará online e funcionando!

**URLs finais:**
- Site: `https://seudominio.com`
- Admin: `https://seudominio.com/admin.html`