const UserRepository=require("../../repositories/users/userRepository")
 
class Generator {

    static async generateUsername(nomComplet, email) {


        let username;
        const nomSansEspaces = nomComplet.replace(/\s+/g, '');
        const emailSansAt = email.replace(/@/g, '');
        let baseUsername = nomSansEspaces.substring(0, 3) + emailSansAt.substring(0, 3);
        username = baseUsername;
       
        let existingUsernames = await UserRepository.getByUsername(username);
       
        let count = 1;
        while (existingUsernames) {
            username = baseUsername + count;
            count++;
            existingUsernames = await UserRepository.getByUsername(username);
        }

        return username;
    }
    static formatDateInscription(date) {
        const options = {
            year: 'numeric',
            month: '2-digit',
            day: '2-digit',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
            hour12: false,
        };
        return date.toLocaleString(undefined, options);
    }
}

module.exports=Generator;