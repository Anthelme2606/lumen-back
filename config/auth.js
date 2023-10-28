const jwt = require('jsonwebtoken');
const exemptOperations = ['signUp', 'login']; 
const authenticateUser = (token, operationName) => {
  try {
    if (exemptOperations.includes(operationName)) {
     
      return null;
    }

    const decodedToken = jwt.verify(token, 'votre-secret-jwt'); 

    const userId = decodedToken.userId;
   
    return { userId };
  } catch (error) {
   
    throw new Error('Token invalide');
  }
};


context: async ({ req }) => {
  const token = req.headers.token;
  const operationName = req.body.operationName;
  if (token) {
    return authenticateUser(token, operationName);
  }
 
  throw new Error('Token manquant');
}