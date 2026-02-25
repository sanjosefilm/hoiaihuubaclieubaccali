# SSL Certificate Setup Guide for Bac Lieu Website

## IMPORTANT: Your .htaccess file has been updated to force HTTPS, but you need to install an SSL certificate first!

## Method 1: Let's Encrypt (FREE and Recommended)

### If you have cPanel/WHM access:
1. Log into your cPanel
2. Look for "SSL/TLS" or "Let's Encrypt" in the Security section
3. Click "Let's Encrypt SSL"
4. Select your domain: hoiaihuubaclieubaccali.com
5. Click "Issue" to get a free certificate

### If you have command line access:
```bash
# Install Certbot (Let's Encrypt client)
sudo apt-get update
sudo apt-get install certbot python3-certbot-apache

# Get SSL certificate for your domain
sudo certbot --apache -d hoiaihuubaclieubaccali.com -d www.hoiaihuubaclieubaccali.com

# Test automatic renewal
sudo certbot renew --dry-run
```

## Method 2: Contact Your Web Host

Most web hosting providers offer free SSL certificates:

### Popular hosting providers and their SSL options:
- **GoDaddy**: Free SSL available in hosting control panel
- **Bluehost**: Free SSL through cPanel → SSL/TLS
- **HostGator**: Free SSL in cPanel → SSL/TLS
- **SiteGround**: Free SSL in Site Tools → Security → SSL Manager
- **Namecheap**: Free SSL in cPanel → SSL/TLS

### Steps to contact support:
1. Contact your hosting provider's support
2. Request: "Please install a free SSL certificate for hoiaihuubaclieubaccali.com"
3. They usually can do this within 15-30 minutes

## Method 3: Manual Certificate Purchase

If free options don't work:
1. Purchase SSL from providers like Comodo, DigiCert, or RapidSSL
2. Download certificate files
3. Upload via cPanel SSL/TLS → Manage SSL Sites

## After SSL Installation:

### Test your SSL:
1. Visit: https://hoiaihuubaclieubaccali.com
2. Check for green padlock in browser
3. Run SSL test: https://www.ssllabs.com/ssltest/

### Update any hardcoded links:
- Change any `http://` links in your database/content to `https://`
- Update social media profiles to use HTTPS URL
- Update Google Search Console and Analytics

## What the .htaccess file does:

1. **Redirects HTTP to HTTPS**: All visitors are automatically redirected to secure version
2. **Security Headers**: Protects against common attacks
3. **Performance**: Enables compression and caching
4. **HSTS**: Forces browsers to always use HTTPS for future visits

## Troubleshooting:

### "Not Secure" still shows:
- Clear browser cache and cookies
- Check for mixed content (HTTP resources on HTTPS page)
- Verify SSL certificate is properly installed

### 500 Internal Server Error:
- Your server might not support .htaccess modifications
- Contact your hosting provider
- Or temporarily remove the .htaccess file

### Need immediate fix:
If you need to disable HTTPS redirect temporarily:
1. Open .htaccess file
2. Add # before these lines:
   ```
   # RewriteCond %{HTTPS} off
   # RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
   ```

## Contact Information:
- Your hosting provider's support is the quickest solution
- Most hosts provide free SSL certificates in 2026
- Let's Encrypt certificates are valid for 90 days and auto-renew

**Remember**: Once SSL is installed, your website will show as "Secure" with a green padlock! 🔒✅