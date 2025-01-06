function validateLoginForm() 
{
    let uname = document.getElementsByName('uName')[0].value;
            let password = document.getElementsByName('pass')[0].value;
			if(uname == "" && password == "")
			{
            	alert('Fill in the Required Credentials');
            	return false;
            }

            if(uname == "")
			{
            	alert('Username is required');
            	return false;
            }

            if(password == "")
			{
                alert('Password is required');
                return false;
            }


            return true;
}