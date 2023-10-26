const express = require('express');
const mongoose = require('mongoose');
require("dotenv").config();
const PORT=process.env.PORT;
const BodyParser=require("body-parser");
const { ApolloServer } = require("@apollo/server");
const { expressMiddleware } = require("@apollo/server/express4");
const { graphqlUploadExpress }=require("graphql-upload-minimal");
const ExpressFileUpload=require("express-fileupload");
const path=require("path");
const cors = require("cors");
const http = require("http");

const User=require("./models/users/userModel");

const jwt =require("jsonwebtoken");
const { json } = require("body-parser");

const dbConfig=require("../config/dbConfig");
const context=require("../context/context");
const morgan = require("morgan");
require("dotenv").config();
const app = express();
const typeDefs = require('./graphql/types/index');
const resolvers = require('./graphql/resolvers/index');
const startServer = async () => {
  const app = express();

  app.use(morgan("dev"));
  app.use(ExpressFileUpload());
  app.use(express.urlencoded({ extended: true }));
  // const corsOptions={
  //   origin:'http://localhost:4200/',
  //   Credentials:true,
  // };
  app.use(cors());
  //app.use(MinimalGraph());

  const httpServer = http.createServer(app);

  dbConfig.connect();

  const server = new ApolloServer({
    typeDefs,
    resolvers,
    uploads:false,
    csrfPrevention: false,
    includeStacktraceInErrorResponses: false,
   
  });
  await server.start();
  app.use(
    "/graphql",
    graphqlUploadExpress(),
    json(),
   // MinimalGraph({maxFileSize:10000000,maxFiles:10}),
   expressMiddleware(server, {
     context: context,
    })
  );
  new Promise((resolve) => httpServer.listen({ port: PORT }, resolve));
 

  console.log(`🚀 Server ready at http://localhost:${PORT}/graphql`);
};

startServer();
