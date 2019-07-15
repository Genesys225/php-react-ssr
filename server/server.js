import path from "path";
import cors from "cors";
import component_router from "../nodeApi/rendering-service/component";
import bodyParser from "body-parser";

import express from "express";

const PORT = 3000;
const app = express();

const router = express.Router();

app.use(cors());
app.use(bodyParser.json());

// const serverRenderer = (req, res, next) => {
//   fs.readFile(path.resolve("./build/index.html"), "utf8", (err, data) => {
//     if (err) {
//       console.error(err);
//       return res.status(500).send("An error occurred");
//     }
//     console.trace(req.originalUrl);

//     return res.send(
//       data.replace(
//         '<div id="root"></div>',
//         `<div id="root">${ReactDOMServer.renderToString(<App req={req} />)}</div>`
//       )
//     );
//   });
// };
// router.use("/country", serverRenderer);

router.use(express.static(path.resolve(__dirname, "..", "build")));

app.use("*", component_router);

// // tell the app to use the above rules
// app.use(router);

app.use(express.static("./build"));
app.listen(PORT, () => {
  console.log(`SSR running on port ${PORT}`);
});
