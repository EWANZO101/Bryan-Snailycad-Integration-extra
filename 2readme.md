# V1  Bryan Snaily CAD Integration
<p>This script holds functions for FiveM scripts to co-operate with Snaily CAD
These functions can be called from other scripts with appropriate exports.</p>

# V2 coming soon


## Setup
```lua
Config.Defaults = {
  Framework = 'qbcore' -- Choose between 'qbcore' or 'esx'

    registrationStatus = 'Valid'
}
```
This table helps to set Default values in certain functions.

``registrationStatus`` - License Type when registering new Vehicle or Weapon

```lua
Config.API = {
    URL = 'api_url',
    TOKEN = 'token',
    TOKEN_HEADER_NAME = 'snaily-cad-api-token',
}
```
``URL`` - Link on which your CAD is hosted (example: https://api.your-domain-here/v1/ or https://api-test.your-domain-here/v1/)

``TOKEN`` - You can find this Token in your CAD Settings (Admin > CAD Settings > API Token)

## Exports

### Is Citizen Registered
Checks if the Citizen exists in the CAD system

```lua
exports['bryan_snaily']:IsCitizenRegistered(firstname, lastname)
```

| Paramater | Type | Optional | Default | Description |
|-|-|:-:|-|-|
| ``firstname`` | (string) | |  | Character's Firstname |
| ``lastname`` | (string) | |  | Character's Lastname |

### Insert New Citizen

```lua
exports['bryan_snaily']:InsertNewCitizen(firstname, lastname, birthdate, gender, ethnicity, height, weight, hairColor, eyeColor, address)
```

| Paramater | Type | Optional | Default | Description |
|-|-|:-:|-|-|
| ``firstname`` | (string) | |  | Firstname |
| ``lastname`` | (string) | |  | Lastname |
| ``birthdate`` | (string) | | | Birthdate (format: YYYY/MM/DD) |
| ``gender`` | (string/int) | Yes | Male | Gender |
| ``ethnicity`` | (string) | Yes | (Random) | Ethnicity |
| ``height`` | (int) | Yes |  | Height |
| ``weight`` | (int) | Yes |  | Weight |
| ``hairColor`` | (string) | Yes | | Hair Color |
| ``eyeColor`` | (string) | Yes | | Eye Color |
| ``address`` | (string) | Yes | | Address |
### Set License to Citizen

```lua
exports['bryan_snaily']:SetLicenseToCitizen(license, value, firstname, lastname)
```

| Paramater | Type | Optional | Default | Description |
|-|-|:-:|-|-|
| ``license`` | (string) | |  | License (``weaponLicense``/``driversLicense``/``pilotLicense``/...) |
| ``value`` | (string) | |  | License Value (example: ``Valid``/``Suspended``/...) |
| ``firstname`` | (string) | |  | Character's Firstname |
| ``lastname`` | (string) | |  | Character's Lastname |


### ESX

<details><summary>Insert New Citizen</summary><br>

> esx_identity/server/main.lua

```lua
ESX.RegisterServerCallback('esx_identity:registerIdentity', function(source, cb, data)
    <...>

    local formattedFirstName = formatName(data.firstname)
    local formattedLastName = formatName(data.lastname)
    local formattedDate = formatDate(data.dateofbirth)

    data.firstname = formattedFirstName
    data.lastname = formattedLastName
    data.dateofbirth = formattedDate
    local Identity = {
        firstName = formattedFirstName,
        lastName = formattedLastName,
        dateOfBirth = formattedDate,
        sex = data.sex,
        height = data.height
    }

    -- Insert This Here --
    exports['bryan_snaily']:InsertNewCitizen(formattedFirstName, formattedLastName, formattedDate, data.sex, nil, data.height)
    --

    TriggerEvent('esx_identity:completedRegistration', source, data)
    TriggerClientEvent('esx_identity:setPlayerData', source, Identity)
    cb(true)
end)
```
</details>


### QB

<details><summary>Insert New Citizen</summary><br>

> qb-multicharacter/server/main.lua

```lua
RegisterNetEvent('qb-multicharacter:server:createCharacter', function(data)
    local src = source
    local newData = {}
    newData.cid = data.cid
    newData.charinfo = data
    if QBCore.Player.Login(src, false, newData) then
        repeat
            Wait(10)
        until hasDonePreloading[src]

        -- Insert This Here --
        exports['bryan_snaily']:InsertNewCitizen(data.firstname, data.lastname, data.birthdate, data.gender)
        --

        <...>
    end
end)
```
</details>
