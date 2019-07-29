import path from "path";
import cors from "cors";
import component_router from "../nodeApi/rendering-service/component";
import bodyParser from "body-parser";

import express from "express";

const PORT = 3000;
const app = express();

app.use(cors());
app.use(bodyParser.json());

app.use(express.static(path.resolve(__dirname, "..", "build")));

app.use("*", component_router);

// // tell the app to use the above rules
// app.use(router);

app.listen(PORT, () => {
  console.log(`SSR running on port ${PORT}`);
});
