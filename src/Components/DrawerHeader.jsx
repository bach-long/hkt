import React from "react";
import { styled } from "@mui/material/styles";

const DrawerHeader = () => {
  return <BoxHeader></BoxHeader>;
};

const BoxHeader = styled("div")(({ theme }) => ({
  display: "flex",
  alignItems: "center",
  padding: theme.spacing(0, 1),
  ...theme.mixins.toolbar,
  justifyContent: "flex-end",
}));

export default DrawerHeader;
