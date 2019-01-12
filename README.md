Tracdelight API V2 PHP-API-Connector (for PHP 7+)



**1. Welcome**

✅ GET /api/v2/ You can test Authentication with this function

**2. locales**



**3. Advertiser**

Init:
```php
$request = new \TRACDELIGHTAPI\Request\Advertiser($client);
```

List all shops:

```php
$output = $request::getAll();
```

Retrieve one particular advertiser:

```php
$output = $request::getByID($id);
```

Search by advertiser name:

```php
$output = $request::getByName('name');
```

Filter by network name:

```php
$output = $request::getByNetworkName('name');
```

Filter by top shop:

```php
$output = $request::getAllTopShops(true);
```

Filter by active campaigns:

```php
$output = $request::getAllActiveCampaign(true);
```

**3. categories**

todo

**4. products**

todo

**5. widgets**

todo

**6. advertisers**

todo

**7. publishers**

todo

**8. users**

todo

**9. user-invitation**

todo

**10. linkgenerator**

todo

**11. tags**

todo

**12. brands**

todo

**13. articles**

todo