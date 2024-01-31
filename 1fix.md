# Issue Resolution: [Script: bryan_snaily] API Error: 400 badRequest

## Description:
The API Error: 400 badRequest occurring in the bryan_snaily script at line 124 of the server.lua file is likely due to the vehicle not being registered in the CAD (Computer-Aided Dispatch) system. This issue commonly arises when dealing with addon vehicles that have not been added to the CAD database, especially in terms of vehicle type registration.

## Steps to Resolve:

1. **CAD Vehicle Registration:**
   - Ensure that the vehicle causing the error is properly registered in the CAD system.
   - Verify that the vehicle type is correctly configured in the CAD database.

2. **Addon Vehicle Inclusion:**
   - If the problematic vehicle is an addon, make sure it has been added to the CAD's list of recognized vehicles.
   - Check the CAD documentation for specific instructions on adding addon vehicles.

3. **Verify API Request:**
   - Inspect the API request at line 124 in the server.lua file to confirm that the data being sent to the CAD complies with the expected format and requirements.

4. **Update CAD Configuration:**
   - If necessary, update the CAD configuration to include any new vehicles or changes made to the vehicle types.

5. **Consult CAD Documentation:**
   - Refer to the CAD system documentation for additional troubleshooting steps and specific guidelines on handling API requests and vehicle registration.

## Additional Notes:

- Ensure that any changes made to the CAD configuration are properly reflected in both the server.lua file and the CAD system.

- For further assistance, reach out to the CAD support or community forums to address any CAD-specific issues.

By following these steps, you should be able to resolve the API Error: 400 badRequest related to the bryan_snaily script.

