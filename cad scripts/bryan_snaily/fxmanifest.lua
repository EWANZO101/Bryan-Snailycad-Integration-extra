fx_version 'cerulean'
game 'gta5'

author 'BryaN'

shared_script 'config.lua'
server_scripts {
    'server/*.lua'
}

escrow_ignore {
    'config.lua',  -- Only ignore one file
    'README.md', -- Works for any file, stream or code
    'fxmanifest.lua', -- Works for any file, stream or code
    
}

lua54 'yes'
