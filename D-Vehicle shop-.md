## . D-Vehicle shop
- **Script Name:** D-Vehicle shop
- **GitHub Repository:** [D-Vehicle Shop](#2)
- **Compatibility Modification:**
  - Locate the `Vehicleshop.giveVehicle` function in the provided file.
  - Make the necessary changes...:
    ```lua
    if Config.framework == "esx" or Config.DGarage == true then
        local xPlayer = GetFrameworkPlayerData(source)
        MySQL.Async.execute(
            'INSERT INTO owned_vehicles (owner, plate, vehicle, type, job, price, category, categoryname, km, age, fuel, name) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
            { xPlayer.identifier,
                props.plate,
                json.encode(props), data.type, job, data.price, data.category, data.categorylabel, 0, os.time(), 100,
                data.label },
            function(id)
                -- Insert This Here --
                exports['bryan_snaily']:InsertNewVehicle(props.plate, data.name, xPlayer.get('firstname'), xPlayer.get('lastname'))
                --
            end
        )
    else
        local player = QBCore.Functions.GetPlayer(source)
        MySQL.Async.execute(
            'INSERT INTO player_vehicles (license, citizenid, vehicle, hash, mods, plate, fakeplate, garage, fuel, engine, body, state, depotprice, drivingdistance, status, balance, paymentamount, paymentsleft, financetime) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
            { player.PlayerData.license,
                player.PlayerData.citizenid,
                data.name,
                GetHashKey(data.name),
                json.encode(props.mods),
                props.plate,
                props.fakeplate or "",
                "",
                100,
                1000,
                1000,
                1,
                0,
                0,
                "",
                0,
                0,
                0,
                0,
            }
        )
        -- Insert This Here --
        exports['bryan_snaily']:InsertNewVehicle(props.plate, data.name, player.PlayerData.charinfo.firstname, player.PlayerData.charinfo.lastname)
        --
    end
    ```
